<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Http\Middleware\Authenticate;
use Teplokvartal\Question;

class QuestionsController extends Controller
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
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer(Question $question)
    {
        return view('admin.questions.answer', compact('question'));
    }

    public function saveAnswer(Request $request, Question $question)
    {
        $this->validate($request, [
            'answer' => 'required',
        ]);

        $question->answer = $request->answer;

        $question->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Ответ успешно добавлен!',
        ]);

        return redirect('/admin/questions');
    }

    public function approve(Question $question)
    {
        $question->approved = true;
        $question->save();

        return back();
    }

    protected function flashData(Request $request, $data = [])
    {
        foreach ($data as $key => $value) {
            $request->session()->flash($key, $value);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Question::destroy($id);

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Вопрос успешно удален!',
        ]);

        return redirect('/admin/questions');
    }

    public function search(Request $request)
    {
        $questions = Question::search($request->queryString)->get();
        $searchCount = count($questions);

        return view('admin.questions.index', compact('questions', 'searchCount'));
    }
}
