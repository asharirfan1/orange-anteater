@extends('layout')

@section('content')
<section class="gray-section">
    <div class="container">
        <div class="row photo-expanded">
            <div class="col-xs-12">
                <h3>{{ $photo->name }}</h3>
                <img class="img-responsive" src="{{ $photo->image }}" alt="">
            </div>
            <div class="col-xs-12">
                <div class="article-text">{!! $photo->content !!}</div>
                <a class="btn Button" href="/photos/{{ $productName }}">назад <span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>
</section>
@stop
