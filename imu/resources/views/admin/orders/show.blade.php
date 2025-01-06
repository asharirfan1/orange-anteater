@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <div class="row">
            <h1>Просмотр заявки</h1>
            <div class="divider"></div>
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
                        <p class="description">{{ $order->question }}</p>
                    </ul>
                </div>
                <div class="col-xs-12">
                    <a href="/admin/orders" type="submit" class="btn Button Button--blue right-margin"><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</a>
                <form action="/admin/orders/{{ $order->id }}" method="POST" class="delete-form pull-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn Button pull-right" style="margin-right: 5px"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    @stop
