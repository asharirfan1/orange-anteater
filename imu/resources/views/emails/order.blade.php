<h1>Заявка от {{ $client_name }}</h1>

<h2>Контактные данные</h2>
<ul>
    <li>Телефон 1: <strong>{{ $phone1 }}</strong></li>
    <li>Телефон 2: <strong>{{ $phone2 }}</strong></li>
    <li>Email: <strong>{{ $email }}</strong></li>
</ul>

<h2>Суть вопроса</h2>
<p>{!! $question !!}</p>
