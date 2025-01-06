@extends('layout')

@section('content')
<section class="gray-section">
    <div class="container">
        <div class="row article-expanded">
            <div class="col-xs-12">
                <h3>{{ $article->name }}</h3>
                <img class="img-responsive" src="{{ $article->image }}" alt="">
            </div>
            <div class="col-xs-12">
                <div class="article-text">{!! $article->content !!}</div>
                <a class="btn Button" href="/articles/{{ $productName }}">назад <span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>
</section>
@stop
