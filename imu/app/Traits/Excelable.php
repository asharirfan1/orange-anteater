<?php

namespace Teplokvartal\Traits;

use Excel;

trait Excelable
{
    public function readPricesFromExcel($chimneyType)
    {
        $prices = [];
        Excel::load('excel/0.5.xlsx', function ($reader05) use (&$prices, $chimneyType) {

            Excel::load('excel/0.8.xlsx', function ($reader08) use (&$prices, $reader05, $chimneyType) {

                Excel::load('excel/1.xlsx', function ($reader1) use (&$prices, $reader05, $reader08, $chimneyType) {

                    $readers = [$reader05, $reader08, $reader1];
                    $prices = $this->getPricesByType($readers, $chimneyType);
                });
            });
        });

        return $prices;
    }

    public function getPricesByType($excelReaders, $chimneyType)
    {
        $sheetIndex = $this->determineSheetIndex($chimneyType);

        $prices = $this->groupPricesByWidth($excelReaders, $sheetIndex);

        return $this->groupPricesByProduct($prices);
    }

    public function groupPricesByWidth($excelReaders, $sheetIndex)
    {
        $prices['0.5'] = $excelReaders[0]->toArray()[$sheetIndex];
        $prices['0.8'] = $excelReaders[1]->toArray()[$sheetIndex];
        $prices['1.0'] = $excelReaders[2]->toArray()[$sheetIndex];

        return $prices;
    }

    public function groupPricesByProduct($prices)
    {
        // $newPrices = $this->getProductNames($prices);

        foreach ($prices['0.5'] as $productPrices) {
            $productName = $productPrices['elements'];
            unset($productPrices['elements']);
            $groupedPrices[$productName]['0.5'] = $productPrices;
        }

        foreach ($prices['0.8'] as $productPrices) {
            $productName = $productPrices['elements'];
            unset($productPrices['elements']);
            $groupedPrices[$productName]['0.8'] = $productPrices;
        }

        foreach ($prices['1.0'] as $productPrices) {
            $productName = $productPrices['elements'];
            unset($productPrices['elements']);
            $groupedPrices[$productName]['1.0'] = $productPrices;
        }

        return $groupedPrices;
    }

    // public function getProductNames($prices)
    // {
    //     $biggestPriceList = $this->getBiggestPriceList($prices);

    //     return array_column($biggestPriceList, 'elements');
    // }

    // public function getBiggestPriceList($prices)
    // {
    //     if (count($prices['0.5']) > count($prices['0.8'])) {
    //         return count($prices['0.5']) > count($prices['1.0']) ? $prices['0.5'] : $prices['1.0'];
    //     } else {
    //         return count($prices['0.8']) > count($prices['1.0']) ? $prices['0.8'] : $prices['1.0'];
    //     }
    // }

    public function determineSheetIndex($chimneyType)
    {
        switch ($chimneyType) {
            case 'одностенный':
                return 0;
            case 'утепленный':
                return 1;
            case 'алюком':
                return 2;
            case 'керамический':
                return 3;
        }
    }

}
