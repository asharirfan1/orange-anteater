<?php

namespace Teplokvartal\Http\Controllers;

use Teplokvartal\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index($productName)
    {
        $photos = Photo::where('product_name', $productName)->orderBy('created_at', 'desc')->paginate();
        return view('photos.index', compact('photos', 'productName'));
    }

    public function show($productName, Photo $photo)
    {
        return view('photos.show', compact('photo', 'productName'));
    }

    public function search($productName, Request $request)
    {
        $photos = Photo::where('product_name', $productName)->search($request->queryString)->get();
        $searchCount = count($photos);

        return view('photos.index', compact('photos', 'searchCount', 'productName'));
    }
}
