@extends('layout') @section('content')

<div class="page">
    <div class="container">
        <h1>{{ isset($type) ? $type : 'Результаты поиска' }}</h1>
        <div class="divider"></div>
        @if ( Request::is('chimneys/search*') )
            @include ('partials.search-results', ['returnUrl' => '/chimneys/catalog'])
        @endif
        @if (count($chimneys))
            @foreach ($chimneys as $chimney)
            <div class="chimney">
                <div class="col-md-3">
                    @if ( $chimney->image )
                    <img class="img-responsive item-img" src="{{ $chimney->image }}" alt="picture">@endif
                </div>
                <div class="col-md-9">
                    <h3>{{ str_replace('*', '&deg;', $chimney->name) }}</h3>
                    <div class="description"><strong>Описание:</strong><br><br>{!! $chimney->desc !!}</div><br>
                    @if ($chimney->width)
                        <p class="description"><strong>Толщина:</strong> {{ $chimney->width }}</p>
                    @endif
                    {{-- <p class="description"><strong>Тип:</strong> {{ $chimney->type }}</p> --}}
             {{--        <h4>Толщина: </h4>
                    <label class="radio-inline">
                        <input type="radio" name="width" value="0.5" checked="checked">0.5мм AISI 304
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="width" value="0.8">0.8мм AISI 304
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="width" value="1">1мм AISI 321
                    </label>
                    <span id="name" style="display: none">{{ $chimney->name }}</span> --}}

                    <strong>Таблица цен:</strong>
                    <table class="prices-table">
                        <tr class="table-meta">
                            <th>Диаметр</th>
                            <th style="text-align: center" colspan="3">Толщина</th>
                        </tr>
                        <tr class="table-meta">
                            <th></th>
                            <th>0.5мм</th>
                            <th>0.8мм</th>
                            <th>1.0мм</th>
                        </tr>
                        {{-- {{ dd($chimney->name) }} --}}
                        @foreach ($prices[$chimney->name]['0.5'] as $width => $price)
                            <tr class="table-data">
                                <th>{{ str_replace('_', ' / ', $width) }}</th>
                                <td>{{ round(preg_replace('/(.\...).*/', '$1', $price)) }}</td>
                                <td>{{ round(preg_replace('/(.\...).*/', '$1', $prices[$chimney->name]['0.8'][$width])) }}</td>
                                <td>{{ round(preg_replace('/(.\...).*/', '$1', $prices[$chimney->name]['1.0'][$width])) }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a class="expand-table-link">Развернуть</a>

                </div>
                <div class="col-xs-12" style="margin-top: 30px">
                    {{-- <a class="btn Button Button__more" href="/chimneys/catalog/{{ $chimney->type }}/{{ $chimney->id }}"><i class="fa fa-chevron-right" aria-hidden="true"></i> подробнее</a> --}}
                    <a class="btn Button Button--blue Button__more" href="/chimneys/prices"><i class="fa fa-chevron-right" aria-hidden="true"></i> все цены</a>
                </div>
            </div>
            @endforeach
            <div class="pagination-wrapper">
            @if (!Request::is('chimneys/search*'))
               {!! $chimneys->render() !!}
            @endif
            </div>
        @endif
    </div>
</div>
@stop
