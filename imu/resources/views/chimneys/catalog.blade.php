@extends('layout') @section('content')
<div class="page">
    <div id="service">
        <div class="container">

            <h1>Каталог дымоходов</h1>
            <div class="divider"></div>

            <div class="row text-center">
                <div class="col-xs-6 col-sm-4 col-md-3 hero-feature">
                    <div class="thumbnail">
                        <img src="/images/chimneys/one-wall/koleno_90_big.jpg" class="catalog-img" alt="">
                        <div class="caption">
                            <h3 style="font-size: 24px">Одностенные</h3>
                            <a href="/chimneys/catalog/одностенный" class="Button">Посмотреть</a> 
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 hero-feature">
                    <div class="thumbnail">
                        <img src="/images/chimneys/termo/грибок_термо_оц.jpg" class="catalog-img" alt="">
                        <div class="caption">
                            <h3 style="font-size: 24px">Утепленные</h3>
                            <a href="/chimneys/catalog/утепленный" class="Button">Посмотреть</a> 
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 hero-feature">
                    <div class="thumbnail">
                        <img src="/images/chimneys/termo/Konys_оц.jpg" alt="">
                        <div class="caption">
                            <h3 style="font-size: 24px">Алюком</h3>
                            <a href="/chimneys/catalog/алюком" class="Button Button">Посмотреть</a> 
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 hero-feature">
                    <div class="thumbnail">
                        <img src="/images/chimneys/termo/podstavka_mal.jpg" alt="">
                        <div class="caption">
                            <h3 style="font-size: 24px">Керамические</h3>
                            <a href="/chimneys/catalog/керамический" class="Button">Посмотреть</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
