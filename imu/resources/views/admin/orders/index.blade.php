@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="col-xs-12 flash-block">
            @include ('partials.flash')
        </div>
        <h1>{{ Request::input('queryString') ? 'Результаты поиска' : 'Заявки' }}</h1>
        <div class="divider"></div>
        <div class="row">
            @if ( Request::is('admin/orders/search*') ) @include ('partials.search-results',
            ['returnUrl' => '/admin/orders']) @endif @if (count($orders)) @foreach($orders
            as $order)
            <div class="order">
                <div class="col-xs-12">
                    <span class="pull-right" style="font-size: 16px">{{ $order->created_at->format('d.m.Y') }} </span> 
                    <h4><strong>№ {{ $order->id }}</strong></h4>
                    <ul>
                        <li>Контактное лицо: <strong>{{ $order->client_name }}</strong>
                        </li>
                        <li>Телефон 1: <strong>{{ $order->phone1 }}</strong>
                        </li>
                        <li>Телефон 2: <strong>{{ $order->phone2 }}</strong>
                        </li>
                        <li>Email: <strong>{{ $order->email }}</strong>
                        </li>
                        <h4>Суть вопроса</h4>
                        <p class="description">{{ str_limit($order->question, 150) }}</p>
                    </ul>
                </div>
                <div class="col-xs-12">
                    <form action="/admin/orders/{{ $order->id }}" method="POST">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <a href="/admin/orders/{{ $order->id }}" class="btn Button Button--blue pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i> Просмотреть</a>
                        <button class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
                    </form>
                </div>
            </div>
            @endforeach
            <div class="pagination-wrapper">
                @if (!Request::is('admin/orders/search*')) {!! $orders->render() !!} @endif
            </div>
            @endif
        </div>
    </div>
    @stop
