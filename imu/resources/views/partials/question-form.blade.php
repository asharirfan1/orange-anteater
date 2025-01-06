@include ('partials.errors')
<form action="/pages/questions" method="POST" class="question-form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="topic">Тема вопроса</label>
        <input type="text" class="form-control" id="topic" name="topic" value="{{ old('topic') }}">
    </div>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea type="text" class="form-control" id="text" name="text">{{ old('text') }}</textarea>
    </div>
    <div class="form-group" style="text-align: right">
        <button type="submit" class="btn Button Button--green"><i class="fa fa-question-circle" aria-hidden="true"></i> Задать вопрос</button>
    </div>
</form>