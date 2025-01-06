<?php

namespace Teplokvartal\Http\Controllers;

use Teplokvartal\Question;
use Illuminate\Http\Request;
use Teplokvartal\Page;
use Teplokvartal\Order;
use Teplokvartal\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.main');
    }

    public function show(Page $page)
    {
        // dd(Page::all());
        // dd($page);
        return view('pages.index', compact('page'));
    } 

    public function order()
    {
        return view('pages.order');
    }

    public function saveOrder(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required|string',
            'email' => 'email',
            'question' => 'required',
        ]);

        Order::create($request->all());

        $data = $request->all();
        $data['question'] = str_replace("\n", "<br>", $request->question);

        \Mail::send('emails.order', $data, function ($message) {
            $message->subject('Оформление заказа')
                ->to('i.i.babko@gmail.com');
        });

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Заявка успешно оформлена'
        ]);

        return redirect('/pages/order');
    }

    public function questions()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.questions', compact('questions'));
    }

    public function saveQuestion(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'text' => 'required',
        ]);

        Question::create($request->all());

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Спасибо за Ваш вопрос!'
        ]);

        return redirect('pages/questions');
    }

    public function searchQuestion(Request $request)
    {
        $questions = Question::search($request->queryString)->get();
        $searchCount    = count($questions);

        return view('pages.questions', compact('questions', 'searchCount'));
    }

    protected function flashData(Request $request, $data = [])
    {
        foreach ($data as $key => $value) {
            $request->session()->flash($key, $value);
        }
    }

}
