@extends('admin.layout') @section('content')
<div class="page">
    <div class="container">
        <div class="col-xs-12 flash-block">
            @include ('partials.flash')
        </div>
        <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Статьи' }}</h1>
        <div class="divider"></div>
        <div class="row">
            @if ( Request::is('admin/articles/search*') ) @include ('partials.search-results',
            ['returnUrl' => '/admin/articles']) @endif
            <div class="col-xs-12 add-resource-div">
                <a href="/admin/articles/create" style="margin-top: 20px" class="btn Button Button__add-resource Button--green"><i class="fa fa-plus-square" aria-hidden="true"></i> Добавить статью</a>
            </div>
        </div>
        @if (count($articles)) @foreach ($articles as $article)
        <div class="row article">
            <div class="col-md-7">
                <img class="img-responsive" src="{{ $article->image }}" alt="">
            </div>
            <div class="col-md-5" style="position: static">
                <h3>{{ $article->name }}</h3>
                <div>{!! str_limit($article->desc, 200) !!}</div>
                <p class="description"><strong>Категория:</strong> {{ $article->product_name == 'chimneys' ? 'дымоходы' : ($article->product_name == 'briquettes' ? 'брикеты' : 'котлы') }}</p>
                <div class="Button__group--positioned" style="right: 40px; bottom: 40px">
                    <a href="/admin/articles/{{ $article->id }}/edit" class="btn Button Button--blue pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</a>
                    <form action="/admin/articles/{{ $article->id }}" method="POST">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pagination-wrapper">
            @if (!Request::is('articles/search*')) {!! $articles->render() !!} @endif
        </div>
        @endif
    </div>
</div>
@stop
