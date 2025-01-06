@extends('admin.layout') @section('content')
<div class="page">
    <div class="container">
        <div class="col-xs-12">
            @include ('partials.flash')
        </div>
        <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Страницы' }}</h1>
        <div class="divider"></div>
        <div class="row">
            @if ( Request::is('admin/pages/search*') ) @include ('partials.search-results',
            ['returnUrl' => '/admin/pages']) @endif
            <div class="col-xs-12 add-resource-div">
                <a href="/admin/pages/create" style="margin-top: 20px" class="btn Button Button__add-resource Button--green"><i class="fa fa-plus-square" aria-hidden="true"></i> Добавить страницу</a>
            </div>
        </div>
        @if (count($pages)) @foreach ($pages as $page)
        <div class="row article">
            <div class="col-md-7">
                <img class="img-responsive" src="{{ $page->image }}" alt="">
            </div>
            <div class="col-md-5" style="position: static">
                <h3>{{ $page->name }}</h3>
                <div>{!! $page->desc !!}</div>
                <div class="Button__group--positioned" style="right: 40px; bottom: 40px">
                    <a href="/admin/pages/{{ $page->id }}/edit" class="btn Button Button--blue pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</a>
                    <form action="/admin/pages/{{ $page->id }}" method="POST">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pagination-wrapper">
            @if (!Request::is('pages/search*')) {!! $pages->render() !!} @endif
        </div>
        @endif
    </div>
</div>
@stop
