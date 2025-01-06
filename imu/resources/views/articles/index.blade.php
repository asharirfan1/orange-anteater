@extends('layout') @section('content')
<div class="page">
    <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Статьи' }}</h1>
    <div class="divider"></div>
    <div class="container">
        @if ( Request::is('articles/' . $productName . '/search*') )
            @include ('partials.search-results', ['returnUrl' => '/articles/'.$productName])
        @endif
        @if (count($articles))
            @foreach ($articles as $article)
            <div class="row article">
                <div class="col-md-7">
                    <img class="img-responsive" src="{{ $article->image }}" alt="">
                </div>
                <div class="col-md-5" style="position: static">
                    <h3>{{ $article->name }}</h3>
                    <div class="small-description">{!! str_limit($article->desc, 250) !!}</div>
                    <a class="btn Button Button__more--positioned" style="display: inline-block; margin-top: 30px !important" href="/articles/{{ $productName }}/{{ $article->id }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> подробнее</a>
                </div>
            </div>
            @endforeach
            <div class="pagination-wrapper">
            @if (!Request::is('/articles/' . $productName . '/search*'))
               {!! $articles->render() !!}
            @endif
            </div>
        @endif
    </div>
</div>
@stop
