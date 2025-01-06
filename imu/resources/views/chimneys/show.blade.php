@extends('layout')

@section('content')
<section class="gray-section">
    <div class="container">
        <div class="row resource-expanded">
            <div class="col-xs-12">
                <h3>{{ $chimney->name }}</h3>
                <img class="img-responsive" src="{{ $chimney->image }}" alt="">
            </div>
            <div class="col-xs-12">
                <div class="article-text">{!! $chimney->content !!}</div>
                @if ($chimney->width)
                    <p class="description"><strong>Толщина:</strong> {{ $chimney->width }}</p>
                @endif
                <p class="description"><strong>Тип:</strong> {{ $chimney->type }}</p>
                <a class="btn Button" href="/chimneys/catalog/{{ $type }}">назад <span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="btn Button Button--blue pull-right" href="/chimneys/prices"><i class="fa fa-usd" aria-hidden="true"></i> Цены</a>
            </div>
        </div>
    </div>
</section>
@stop
