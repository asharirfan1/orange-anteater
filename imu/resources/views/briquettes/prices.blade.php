@extends('layout')

@section('content')
<div class="page">
    <h1>Цены</h1>
    <div class="divider"></div>
    <div class="container">
        <div class="row article-expanded">
            <div class="prices">
                @if (count($prices))
                    @foreach ($prices as $priceImg)
                        <a href="{{ '/images/prices/briquettes/' . $priceImg }}"><img src="{{ '/images/prices/briquettes/' . $priceImg }}" class="price-img"></a>
                    @endforeach
                @else
                    На данный момент цены не доступны
                @endif
            </div>
        </div>
    </div>
</div>
@stop