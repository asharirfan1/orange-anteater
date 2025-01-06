@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Ответить</h1>
            <div class="divider"></div>
            <div class="col-xs-12 question">
                <h3>{{ $question->topic }}</h3>
                <p>{{ $question->text }}</p>
            </div>
            @include ('partials.errors')
            <form action="/admin/questions/{{ $question->id }}/answer" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="answer">Ответ</label>
                    <textarea class="form-control" id="answer" name="answer">{!! old('answer') ? old('answer') : $question->answer !!}</textarea>
                </div>
                <button type="submit" class="btn Button Button--green" style="float: right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
                <a href="/admin/questions" class="btn Button Button--blue right-margin"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</a>
            </form>
            <form action="/admin/questions/{{ $question->id }}" method="POST" class="delete-form pull-left">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
            </form>
        </div>
    </div>
</div>
@stop