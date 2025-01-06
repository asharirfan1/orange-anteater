<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Teplokvartal\Http\Requests;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Order;
use Teplokvartal\Http\Middleware\Authenticate;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Order::destroy($id); 

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Заявка успешно удалена!',
        ]);

        return redirect('/admin/orders');
    }

    protected function flashData(Request $request, $data = [])
    {
        foreach ($data as $key => $value) {
            $request->session()->flash($key, $value);
        }
    }

    public function search(Request $request)
    {
        $orders = Order::search($request->queryString)->get();
        $searchCount    = count($orders);

        return view('admin.orders.index', compact('orders', 'searchCount'));
    }
}
