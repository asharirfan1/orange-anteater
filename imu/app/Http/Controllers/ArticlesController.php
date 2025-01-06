<?php

namespace Teplokvartal\Http\Controllers;

use Teplokvartal\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index($productName)
    {
        $articles = Article::where('product_name', $productName)->orderBy('created_at', 'desc')->paginate();
        return view('articles.index', compact('articles', 'productName'));
    }

    public function show($productName, Article $article)
    {
        return view('articles.show', compact('article', 'productName'));
    }

    public function search($productName, Request $request)
    {
        $articles = Article::where('product_name', $productName)->search($request->queryString)->get();
        $searchCount = count($articles);

        return view('articles.index', compact('articles', 'searchCount', 'productName'));
    }
}
