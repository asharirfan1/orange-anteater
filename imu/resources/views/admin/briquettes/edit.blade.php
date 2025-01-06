@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Редактировать брикет</h1>
            <div class="divider"></div>
            <div class="col-xs-12">
                @include ('partials.errors')
                <form action="/admin/briquettes/{{ $briquette->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $briquette->name }}"> 
                    </div>
                    <div class="form-group">
                        <label for="desc">Описание</label>
                        <textarea type="text" class="form-control" id="desc" name="desc">{!! old('desc') ? old('desc') : $briquette->desc !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea type="text" class="form-control" id="content" name="content">{!! old('content') ? old('content') : $briquette->content !!}</textarea>
                    </div>
                    <!--<select class="form-control" name="type">
                        <option value="одностенный" {{ $briquette->type == 'одностенный' ? 'selected' :'' }}>одностенный</option>
                        <option value="утепленный" {{ $briquette->type == 'утепленный' ? 'selected' : '' }}>утепленный</option>
                        <option value="алюком" {{ $briquette->type == 'алюком' ? 'selected' : '' }}>алюком</option>
                        <option value="керамический" {{ $briquette->type == 'керамический' ? 'selected' : '' }}>керамический</option>
                    </select>-->
                    <!--<div class="form-group" style="margin: 20px 0">
                        <label for="image">Изменить изображение</label>
                        <input type="file" id="image" name="image">
                        <img src="{{ $briquette->image }}" class="thumb">
                    </div>-->
                    <div class="form-group">
                        <label for="image">Главная картинка</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ old('image') ? old('image') : $briquette->image }}">
                    </div>
                    <button type="submit" class="btn Button Button--green" style="float: right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
                    <a href="/admin/briquettes" type="submit" class="btn Button Button--blue right-margin"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</a>
                </form>
                <form action="/admin/briquettes/{{ $briquette->id }}" method="POST" class="delete-form pull-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
