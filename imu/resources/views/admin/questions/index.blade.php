@extends('admin.layout') @section('content')
<div class="page">
    <div class="col-xs-12 flash-block">
        @include ('partials.flash')
    </div>
    <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Вопросы' }}</h1>
    <div class="divider"></div>
    <div class="container">
        @if ( Request::is('admin/questions/search*') )
        @include ('partials.search-results', ['returnUrl' => '/admin/questions'])
        @endif
        @if ( count($questions) )
        @foreach ($questions as $question)
        <div class="row question">
            <h3>{{ $question->topic }}</h3>
            <p>{{ $question->text }}</p>
            {{-- <p>{{ $question->approve ? '' : 'Не' }} опубликован</p> --}}
            @if ($question->answer)
            <h3 style="color: green">Ответ</h3>
            <p style="color: green">{!! $question->answer !!}</p>
            @else
            <p style="color: #ca7110">На данный вопрос пока ответ отсутствует</p>
            @endif
            <div class="col-xs-12" style="padding: 0">
                @if ( ! $question->approved)
                <a href="/admin/questions/{{ $question->id }}/approve" class="btn Button Button--orange pull-left"><i class="fa fa-eye" aria-hidden="true"></i> Опубликовать</a>
                @endif
                <a href="/admin/questions/{{ $question->id }}/answer" class="btn Button Button--blue pull-right"><i class="fa fa-question-circle" aria-hidden="true"></i> Ответить</a>
                <form action="/admin/questions/{{ $question->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="pagination-wrapper">
            @if (!Request::is('admin/questions/search*'))
            {!! $questions->render() !!}
            @endif
        </div>
        @endif
    </div>
</div>
@stop
