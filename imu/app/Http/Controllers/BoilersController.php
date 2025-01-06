<?php

namespace Teplokvartal\Http\Controllers;

use Session;
use Storage;
use Illuminate\Http\Request;
use Teplokvartal\Http\Requests;
use Teplokvartal\Boiler;
use Nicolaslopezj\Searchable\SearchableTrait;

class BoilersController extends Controller
{
    public function index()
    {
        Session::put('type', 'boilers');

        return view('boilers.index');
    } 
    
    public function catalog()
    {
        $boilers = Boiler::orderBy('created_at', 'desc')->paginate(10);

        return view('boilers.catalog', compact('boilers'));
    }

    public function show(Boiler $boiler)
    {
        return view('boilers.show', compact('type', 'boiler'));
    }

 /*   public function showByType($type)
    {
        $boilers = Boiler::whereType($type)->orderBy('created_at', 'desc')->paginate(10);

        return view('chimneys.showByType', compact('chimneys'));
    } */

    public function prices()
    {
        $prices = scandir(public_path() . '/images/prices/boilers');

        array_shift($prices);
        array_shift($prices);

        return view('boilers.prices', compact('prices'));
    }

    public function search(Request $request)
    {
        $boilers = Boiler::search($request->queryString)->get();
        $searchCount    = count($boilers);

        return view('boilers.catalog', compact('boilers', 'searchCount'));
    }
}
