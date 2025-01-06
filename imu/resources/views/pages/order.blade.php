@extends ('layout') @section ('content')
<div class="page">
    <div class="container">
        <h1>Отправить заявку</h1>
        <div class="divider"></div>
        <div class="row">
            <div class="col-xs-12">
                @include ('partials.flash')
            </div>
            <div class="col-xs-12 col-md-offset-3 col-md-6">
                @include ('partials.errors')
                <form action="/pages/order" method="POST">
                    {{ csrf_field() }}
                    <div class="form-level">
                        <label for="client_name">Контактное лицо</label>
                        <input name="client_name" id="client_name" type="text" class="input-block" value="{{ old('client_name') }}">
                    </div>
                    <div class="form-level">
                        <label for="phone1">Контактное телефон 1</label>
                        <input name="phone1" id="phone1" type="text" class="input-block" value="{{ old('phone1') }}">
                    </div>
                    <div class="form-level">
                        <label for="phone2">Контактное телефон 2</label>
                        <input name="phone2" id="phone2" type="text" class="input-block" value="{{ old('phone2') }}">
                    </div>
                    <div class="form-level">
                        <label for="email">Email</label>
                        <input name="email" id="mail" class="input-block" type="email" value="{{ old('email') }}">
                    </div>
                    <!--<div class="form-level">
                        <label for="type">Вас интересует...</label>
                        <select name="type" class="input-block">
                            <option value="1">Купить элементы дымохода</option>
                            <option value="2">Смонтировать дымоход</option>
                            <option value="3">Купить дымоход и смонтировать</option>
                        </select>
                    </div>-->
                    <label for="question">Суть вопроса</label>
                    <div class="form-level">
                        <textarea name="question" id="question" rows="5" style="width: 100%" class="textarea-block">{{ old('question') }}</textarea>
                    </div>
                    <div class="col-md-12r" style="padding: 0">
                        <button type="submit" class="btn Button Button--orange pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
