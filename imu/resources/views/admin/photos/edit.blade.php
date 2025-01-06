@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Редактировать фотографию</h1>
            <div class="divider"></div>
            <div class="col-xs-12">
                @include ('partials.errors')
                <form action="/admin/photos/{{ $photo->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $photo->name }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Краткое описание</label>
                        <textarea type="text" class="form-control" id="desc" name="desc">{!! old('desc') ? old('desc') : $photo->desc !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea type="text" class="form-control" id="content" name="content">{!! old('content') ? old('content') : $photo->content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Категория</label>
                        <select class="form-control" id="product_name" name="product_name">
                            <option value="chimneys" {{ $photo->product_name == 'chimneys' ? 'selected' :'' }}>дымоходы</option>
                            <option value="briquettes" {{ $photo->product_name == 'briquettes' ? 'selected' : '' }}>брикеты</option>
                            <option value="boilers" {{ $photo->product_name == 'boilers' ? 'selected' : '' }}>котлы</option>
                        </select>
                    </div>
                    <!--<div class="form-group" style="margin: 20px 0">
                        <label for="image">Изменить изображение</label>
                        <input type="file" id="image" name="image">
                        <img src="{{ $photo->image }}" class="thumb">
                    </div>-->
                    <div class="form-group">
                        <label for="image">Главная картинка</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ old('image') ? old('image') : $photo->image }}">
                    </div>
                    <button type="submit" class="btn Button Button--green" style="float: right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
                    <a href="/admin/photos" type="submit" class="btn Button Button--blue right-margin"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</a>
                </form>
                <form action="/admin/photos/{{ $photo->id }}" method="POST" class="delete-form pull-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
