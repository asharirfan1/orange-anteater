<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Teplokvartal\Article;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class ArticlesController extends Controller
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
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'desc' => 'required',
            'content' => 'required',
        ]);

        $article = Article::create($request->all());

        /*if ($request->file('image')) {
        $this->saveImage($request, $article);
        }*/

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Статья успешно добавлена!',
        ]);

        return redirect('/admin/articles');
    }

    /*protected function saveImage(Request $request, Article $article, $replace = false)
    {
    $imageName = $article->id . '.' . $request->file('image')->getClientOriginalExtension();

    if ($replace) {
    \Storage::delete(public_path() . $article->image);
    }

    $request->file('image')->move(public_path() . '/images/uploads/', $imageName);

    $article->image = '/images/uploads/' . $imageName;
    $article->save();
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'name' => 'required',
            //'desc' => 'required',
            'content' => 'required',
        ]);

        /*if ($request->file('image')) {
        $this->saveImage($request, $article, true);
        }*/

        $article->name = $request->name;
        $article->desc = $request->desc;
        $article->content = $request->content;
        $article->product_name = $request->product_name;
        $article->image = $request->image;

        $article->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Статья успешно обновлена!',
        ]);

        return redirect('/admin/articles');
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
        Article::destroy($id);

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Статья успешно удалена!',
        ]);

        return redirect('/admin/articles');
    }

    public function search(Request $request)
    {
        $articles = Article::search($request->queryString)->get();
        $searchCount = count($articles);

        return view('admin.articles.index', compact('articles', 'searchCount'));
    }
}
