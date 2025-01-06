<!DOCTYPE html>
<html>
    <head>
        @include ('partials.head')
    </head>
    <body class="admin">
        @if ( ! Request::is('/') )
            @include ('admin.partials.header')
        @endif
        @yield ('content')
        @include ('partials.scripts')
    </body>
</html>
