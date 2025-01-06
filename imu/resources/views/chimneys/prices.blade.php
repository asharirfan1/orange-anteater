@extends('layout')

@section('content')
<div class="page">
    <h1>Цены</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="row article-expanded">
            <h3>Категории</h3>
            <ul class="price-list">
                <li><a href="#0" data-id="0" class="price-link">Цены на трубы из нержавеющей стали и элементы комплектующие к дымоходам 0.5 мм AISI 304</a></li>
                <li><a href="#1" data-id="1" class="price-link">Цены на трубы из нержавеющей стали и элементы комплектующие к дымоходам 0.5 мм AISI 304</a></li>
                <li><a href="#2" data-id="2" class="price-link">Цены на трубы из нержавеющей стали и элементы комплектующие к дымоходам 0.8 мм AISI 304</a></li>
                <li><a href="#3" data-id="3" class="price-link">Цены на трубы из нержавеющей стали и элементы комплектующие к дымоходам 0.8 мм AISI 304</a></li>
                <li><a href="#4" data-id="4" class="price-link">Цены на трубы из нержавеющей стали и элементы комплектующие к дымоходам 1 мм AISI 304</a></li>
                <li><a href="#5" data-id="5" class="price-link">Цены на трубы из оцинкованной стали и элементы комплектующие к вентиляции</a></li>
                <li><a href="#6" data-id="6" class="price-link">Цены на трубы из нержавеющей и оцинкованной стали и элементы комплектующие к дымоходам с покраской</a></li>
                <li><a href="#7" data-id="7" class="price-link">Цены на трубы из нержавеющей стали и меди</a></li>

            </ul>
            <div class="prices">
                @if (count($prices))
                    @foreach ($prices as $index => $priceImg)
                        <a id="{{ $index }}" href="{{ '/images/prices/chimneys/' . $priceImg }}"><img src="{{ '/images/prices/chimneys/' . $priceImg }}" class="price-img"></a>
                    @endforeach
                @else
                    На данный момент цены не доступны
                @endif
            </div>
        </div>
    </div>
</div>
@stop
