<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductTransaction;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Repositories\SubscriptionRepository;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use MyFatoorah\Library\API\Payment\MyFatoorahPayment;
use MyFatoorah\Library\API\Payment\MyFatoorahPaymentStatus;
use Sample\PayPalClient;

class MyFatoorahController extends AppBaseController
{
    private SubscriptionRepository $subscriptionRepository;

    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function init(Request $request)
    {
        $plan = Plan::with('currency')->findOrFail($request->planId);
        if ($plan->currency->currency_code != null && !in_array(strtoupper($plan->currency->currency_code),
                getMyFatoorahSupportedCurrencies())) {
            return $this->sendError(__('messages.placeholder.this_currency_is_not_supported_fatoorah'));
        }

        $data = $this->subscriptionRepository->manageSubscription($request->all());

        if (!isset($data['plan'])) { // 0 amount plan or try to switch the plan if it is in trial mode
            // returning from here if the plan is free.
            if (isset($data['status']) && $data['status'] == true) {
                return $this->sendSuccess($data['subscriptionPlan']->name . ' ' . __('messages.subscription_pricing_plans.has_been_subscribed'));
            } else {
                if (isset($data['status']) && $data['status'] == false) {
                    return $this->sendError(__('messages.placeholder.cannot_switch_to_zero'));
                }
            }
        }

        $subscription = $data['subscription'];

        $clientSecret = getSelectedPaymentGateway('fatoorah_api_key');


        $config = [
            'apiKey' => $clientSecret,
            'vcCode' => 'KWT',
            'isTest' => true,
        ];

        $paymentMethodId = 0; //to be redirect to MyFatoorah invoice page
        $postFields = [
            'CustomerName' => Auth::user()->first_name,
            'InvoiceValue' => $data['amountToPay'],
            'CustomerEmail' => 'test@test.com',
            'CallBackUrl' => route('my-fatoorah.success'),
            'ErrorUrl' => route('my-fatoorah.failure'),
            'Language' => 'en',
            'CustomerReference' => $subscription->id,
        ];


        try {
            $mfObj = new MyFatoorahPayment($config);
            $data = $mfObj->getInvoiceURL($postFields, $paymentMethodId, $data['subscription']->id);
            return response()->json(['link' => $data['invoiceURL'], 'status' => 200]);
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function success(Request $request)
    {
        $data = $request->all();
        $clientSecret = getSelectedPaymentGateway('fatoorah_api_key');

        $config = [
            'apiKey' => $clientSecret,
            'vcCode' => 'KWT',
            'isTest' => true,
        ];

        $fatoorahPaymentObject = new MyFatoorahPaymentStatus($config);
        $fatoorahPayment = $fatoorahPaymentObject->getPaymentStatus($data['paymentId'], 'PaymentId');

        Subscription::findOrFail($fatoorahPayment->CustomerReference)->update(['status' => Subscription::ACTIVE]);
        // De-Active all other subscription
        Subscription::whereTenantId(getLogInTenantId())
            ->where('id', '!=', $fatoorahPayment->CustomerReference)
            ->where('status', '!=', Subscription::REJECT)
            ->update([
                'status' => Subscription::INACTIVE,
            ]);


        $paymentAmount = $fatoorahPayment->InvoiceTransactions[0]->PaidCurrencyValue;

        $transaction = Transaction::create([
            'transaction_id' => $data['paymentId'],
            'type' => Transaction::FATOORAH,
            'amount' => $paymentAmount,
            'tenant_id' => getLogInTenantId(),
            'status' => Transaction::SUCCESS,
            'meta' => json_encode($fatoorahPayment),
        ]);

        $subscription = Subscription::findOrFail($fatoorahPayment->CustomerReference);
        $subscription->update(['transaction_id' => $transaction->id]);

        return view('sadmin.plans.payment.paymentSuccess');

    }

    public function failure(Request $request)
    {
        return view('sadmin.plans.payment.paymentcancel');
    }


    public static function buyProductOnboard($input, $product)
    {

        $userId = $product->vcard->user->id;
        if (empty($product->currency_id)) {
            $product->currency_id = getUserSettingValue('currency_id', $userId);
        }

        $currencyCode = Currency::whereId($product->currency_id)->first()->currency_code;

        $clientSecret = getUserSettingValue('fatoorah_api_key', $userId);

        $config = [
            'apiKey' => $clientSecret,
            'vcCode' => 'KWT',
            'isTest' => true,
        ];
        session()->put([
            'input' => $input,
        ]);

        $provider = new MyFatoorahPayment($config);
        $postFields = [
            'CustomerName' => Auth::user()->first_name,
            'InvoiceValue' => $product->price,
            'CustomerEmail' => Auth::user()->email,
            'CustomerMobile' => '+1234567890',
            'CallBackUrl' => route('fatoorah.buy.product.success', ['product_id' => $product->id]),
            'ErrorUrl' => route('fatoorah.buy.product.failed'),
            'Language' => 'en',
            'currencyCode' => $currencyCode,
            'NotificationOption' => 'ALL',
        ];

        $payment = $provider->sendPayment($postFields);
        return response()->json(['link' => $payment->InvoiceURL, 'status' => 200, 'product_id' => $product->id]);

    }


    public function productBuySuccess(Request $request)
    {
        $input = session()->get('input');
        $data = $request->all();
        $product = Product::whereId($data['product_id'])->first();
        $userId = $product->vcard->user->id;

        if (empty($product->currency_id)) {
            $product->currency_id = getUserSettingValue('currency_id', $userId);
        }
        $currencyId = Currency::whereId($product->currency_id)->first()->id;

        $clientSecret = getUserSettingValue('fatoorah_api_key', $userId);

        $config = [
            'apiKey' => $clientSecret,
            'vcCode' => 'KWT',
            'isTest' => true,
        ];


        try {
            $fatoorahPaymentObject = new MyFatoorahPaymentStatus($config);
            $fatoorahPayment = $fatoorahPaymentObject->getPaymentStatus($data['paymentId'], 'PaymentId');

            DB::beginTransaction();

            ProductTransaction::create([
                'product_id' => $input['product_id'],
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'currency_id' => $currencyId,
                'meta' => json_encode($fatoorahPayment->InvoiceTransactions),
                'type' => $input['payment_method'],
                'transaction_id' => $fatoorahPayment->InvoiceTransactions[0]->TransactionId,
                'amount' => $fatoorahPayment->InvoiceTransactions[0]->PaidCurrencyValue,
            ]);

            $vcard = $product->vcard;
            App::setLocale(Session::get('languageChange_' . $vcard->url_alias));
            session()->forget('input');
            DB::commit();

            return redirect(route('showProducts', [$vcard->id, $vcard->url_alias, __('messages.placeholder.product_purchase')]));
        } catch (HttpException $ex) {
            print_r($ex->getMessage());
        }
    }


    public function productBuyFailed(): RedirectResponse
    {
        $input = session()->pull('input');
        $product = Product::find($input['product_id']);
        Flash::error(__('messages.placeholder.payment_cancel'));
        return redirect()->route('showProducts', [$product->vcard->id, $product->vcard->url_alias]);
    }


}
