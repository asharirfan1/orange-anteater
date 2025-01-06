@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Добавить статью</h1>
            <div class="divider"></div>
            <div class="col-xs-12">
                @include ('partials.errors')
                <form action="/admin/articles" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Описание</label>
                        <textarea type="text" class="form-control" id="desc" name="desc">{!! old('desc') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea type="text" class="form-control" id="content" name="content">{!! old('content') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Категория</label>
                        <select class="form-control" id="product_name" name="product_name">
                            <option value="chimneys" selected>дымоходы</option>
                            <option value="briquettes">брикеты</option>
                            <option value="boilers">котлы</option>
                        </select>
                    </div>
                    <!--<div class="form-group" style="margin: 20px 0">
                        <label for="image">Добавить изображение</label>
                        <input type="file" id="image" name="image">
                    </div>-->
                    <div class="form-group">
                        <label for="image">Главная картинка</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                    </div>
                    <button type="submit" class="btn Button Button--green" style="float: right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
                    <a href="/admin/articles" type="submit" class="btn Button Button--blue right-margin"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
