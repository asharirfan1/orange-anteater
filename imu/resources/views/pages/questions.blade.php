@extends('layout') @section('content')
<div class="page">
    <div class="col-xs-12 flash-block">
        @include ('partials.flash')
    </div>
    <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Вопросы' }}</h1>
    <div class="divider"></div>
    <div class="container">
        @if ( Request::is('pages/questions/search*') )
        @include ('partials.search-results', ['returnUrl' => '/pages/questions'])
        @endif
        @include ('partials.question-form')
        @if ( count($questions) )
        @foreach ($questions as $question)
        @if ($question->approved)
            <div class="row question">
                <h3>{{ $question->topic }}</h3>
                <p>{{ $question->text }}</p>
                @if ($question->answer)
                <h3 style="color: green">Ответ</h3>
                <p style="color: green">{!! $question->answer !!}</p>
                @else
                <p style="color: #ca7110">На данный вопрос пока ответ отсутствует</p>
                @endif
            </div>
        @endif
        @endforeach
        <div class="pagination-wrapper">
            @if (!Request::is('pages/questions/search*'))
            {!! $questions->render() !!}
            @endif
        </div>
        @endif
    </div>
</div>
@stop
