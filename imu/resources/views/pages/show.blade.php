@extends('layout')

@section('content')
<section class="gray-section">
    <div class="container">
        <div class="row article-expanded">
            <div class="col-xs-12">
                <h3>{{ $page->name }}</h3>
                <img class="img-responsive" src="{{ $article->image }}" alt="">
            </div>
            <div class="col-xs-12">
                <div class="article-text">{!! $page->content !!}</div>
                <a class="btn Button" href="{{ Request::server('HTTP_REFERER') }}">назад <span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>
</section>
@stop