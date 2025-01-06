<?php

namespace Teplokvartal\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Teplokvartal\Chimney;
use Teplokvartal\Traits\Excelable;

class ChimneysController extends Controller
{
    use Excelable;

    public function index()
    {
        Session::put('type', 'chimneys');

        return view('chimneys.index');
    }

    public function catalog()
    {
        return view('chimneys.catalog');
    }

    public function prices()
    {
        $prices = scandir(public_path() . '/images/prices/chimneys');

        array_shift($prices);
        array_shift($prices);

        // This line get rids of .DS_Store file on OS X
        // array_shift($prices);

        return view('chimneys.prices', compact('prices'));
    }

    public function showByType($type)
    {
        $chimneys = Chimney::whereType($type)->orderBy('created_at', 'desc')->paginate(10);

        if ($type == 'одностенный' || $type == 'утепленный') {
            $prices = $this->readPricesFromExcel($type);
        } else {
            $prices = collect([]);
        }

        return view('chimneys.showByType', compact('type', 'chimneys', 'prices'));
    }

    public function show($type, Chimney $chimney)
    {
        return view('chimneys.show', compact('type', 'chimney'));
    }

    public function search(Request $request)
    {
        $chimneys = Chimney::search($request->queryString)->get();
        $searchCount = count($chimneys);

        $prices1 = $this->readPricesFromExcel('одностенный');
        $prices2 = $this->readPricesFromExcel('утепленный');
        // $prices3 = $this->readPricesFromExcel('алюком');
        // $prices4 = $this->readPricesFromExcel('керамический');

        $prices = array_collapse([$prices1, $prices2]);
        // dd($prices);

        return view('chimneys.showByType', compact('chimneys', 'searchCount', 'prices'));
    }
}
