<?php

namespace Teplokvartal\Http\Controllers;

use Illuminate\Http\Request;

use Teplokvartal\Http\Requests;
use Excel;

class PricesController extends Controller
{
    public function getPrice($name, $width)
    {
        $prices = [];
        Excel::load(public_path() . '/excel/mine.xlsx', function($reader) use ($prices) {

            foreach ($reader->toArray() as $row) {
                //if ($row['elementy'] == 'Труба 1 м медь') {
                    $prices[] = $row;
                //}
            }
        });

        dd($prices);

        return $prices;
    }
}
