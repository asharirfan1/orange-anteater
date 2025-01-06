@extends ('admin.layout')

@section ('content')
<div class="page">
    <div class="container">
        <div class="col-xs-12 flash-block">
            @include ('partials.flash')
        </div>
        <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Каталог брикетов' }}</h1>
        <div class="divider"></div>
        <div class="row">
            @if ( Request::is('admin/briquettes/search*') )
                @include ('partials.search-results', ['returnUrl' => '/admin/briquettes'])
            @endif
            <div class="col-xs-12 add-resource-div">
                <a href="/admin/briquettes/create" style="margin-top: 20px" class="btn Button Button__add-resource Button--green"><i class="fa fa-plus-square" aria-hidden="true"></i> Добавить брикет</a>
            </div>
            @if (count($briquettes))
                @foreach ($briquettes as $briquette)
                <div class="briquette">
                    <div class="col-md-3">
                        @if ( $briquette->image )
                            <img class="img-responsive item-img" src="{{ $briquette->image }}" alt="picture">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h3>{{ $briquette->name }}</h3>
                        <h4>Описание</h4> 
                        <div class="description">{!! $briquette->desc !!}</div>
                        <!--<h4>Толщина: </h4>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked">0.5мм AISI 304
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">0.8мм AISI 304
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">1мм AISI 321
                        </label>
                        <h4>Тип</h4>
                        <p class="description">{{ $briquette->type }}</p>-->
                    </div>
                    <div class="col-xs-12">
                        <a href="/admin/briquettes/{{ $briquette->id }}/edit" class="btn Button Button--blue pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</a>
                        <form action="/admin/briquettes/{{ $briquette->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="pagination-wrapper">
            @if (!Request::is('admin/briquettes/search*')) 
               {!! $briquettes->render() !!}
            @endif
            </div>
        @endif
    </div>
</div>
@stop
