@include ('partials.errors')
<form action="/pages/questions/{{ $question->id }}/answer" method="POST" class="question-form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="answer">Ответ</label>
        <textarea type="text" class="form-control" id="answer" name="answer">{{ old('answer') }}</textarea>
    </div>
    <div class="form-group" style="text-align: right">
        <button type="submit" class="btn Button Button--green"><i class="fa fa-question-circle" aria-hidden="true"></i> Ответить</button>
    </div>
</form>