<?php

namespace Teplokvartal\Http\Controllers;

use Session;
use Storage;
use Illuminate\Http\Request;
use Teplokvartal\Http\Requests;
use Teplokvartal\Briquette;
use Nicolaslopezj\Searchable\SearchableTrait;

class BriquettesController extends Controller
{
    public function index()
    {
        Session::put('type', 'briquettes');

        return view('briquettes.index');
    } 
    
    public function catalog()
    {
        $briquettes = Briquette::orderBy('created_at', 'desc')->paginate(10);

        return view('briquettes.catalog', compact('briquettes'));
    }

    public function show(Briquette $briquette)
    {
        return view('briquettes.show', compact('type', 'briquette'));
    }

/*    public function showByType($type)
    {
        $chimneys = Chimney::whereType($type)->orderBy('created_at', 'desc')->paginate(10);

        return view('chimneys.showByType', compact('chimneys'));
    } */

    public function prices()
    {
        $prices = scandir(public_path() . '/images/prices/briquettes');

        array_shift($prices);
        array_shift($prices);

        return view('briquettes.prices', compact('prices'));
    }

    public function search(Request $request)
    {
        $briquettes = Briquette::search($request->queryString)->get();
        $searchCount    = count($briquettes);

        return view('briquettes.catalog', compact('briquettes', 'searchCount'));
    }
}
