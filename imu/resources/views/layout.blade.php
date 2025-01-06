<!DOCTYPE html>
<html lang="en">
    <head>
        @include ('partials.head')
    </head>
    <body>

        @if ( ! Request::is('/') )
            @include ('partials.header')
        @endif

        @yield ('content')

        @include ('partials.footer')


        @include ('partials.scripts')

    </body>
</html>
