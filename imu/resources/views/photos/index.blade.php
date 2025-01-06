@extends('layout') @section('content')
<div class="page">
    <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Фотографии' }}</h1>
    <div class="divider"></div>
    <div class="container">
        @if ( Request::is('photos/' . $productName . '/search*') )
            @include ('partials.search-results', ['returnUrl' => '/photos/'.$productName])
        @endif
        @if (count($photos))
            @foreach ($photos->chunk(3) as $photosRow)
            <div class="row">
                @foreach ($photosRow as $photo)
                <div class="col-md-4 portfolio-item">
                    <a href="/images/logo.png" class="fancybox" title="{{ $photo->name }}">
                        <img class="img-responsive" src="{{ $photo->image }}" alt="">
                    </a>
                    <div class="photo-description">
                        <div>{!! str_limit($photo->desc, 150) !!}</div>
                        <a href="/photos/{{ $productName }}/{{ $photo->id }}" style="display: inline-block; margin-top: 30px !important" class="btn Button Button__more--positioned" style="right: 20px; bottom: 20px"><i class="fa fa-chevron-right" aria-hidden="true"></i> подробнее</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="pagination-wrapper">
            @if (!Request::is('/photos/' . $productName . '/search*'))
                {!! $photos->render() !!}
            @endif
            </div>
        @endif
    </div>
</div>
@stop
