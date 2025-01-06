<nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
    <ul class="nav navbar-nav navbar-right">
            <li><a href="/" class="">главная</a>
            </li>
            @if ( Session::get('type') == 'chimneys' )
            <li class="{{ Request::is('chimneys') ? 'active' : '' }}"><a href="/chimneys" class="">дымоходы</a>
            </li>
            <li class="{{ Request::is('chimneys/*') && !Request::is('chimneys/prices') && !Request::is('chimneys/articles*') && !Request::is('chimneys/photos*') ? 'active' : '' }}"><a href="/chimneys/catalog" class="">каталог</a>
            </li>
            <li class="{{ Request::is('chimneys/prices') ? 'active' : '' }}"><a href="/chimneys/prices" class="">цены</a>
            </li>
            <li class="{{ Request::is('articles/chimneys*') ? 'active' : '' }}"><a href="/articles/chimneys" class="">статьи</a>
            </li>
            <li class="{{ Request::is('photos/chimnyes*') ? 'active' : '' }}"><a href="/photos/chimneys" class="">фото</a>
            </li>
            @elseif ( Session::get('type') == 'briquettes' )
            <li class="{{ Request::is('briquettes') ? 'active' : '' }}"><a href="/briquettes" class="">брикеты</a>
            </li>
            <li class="{{ Request::is('briquettes/*') && !Request::is('briquettes/prices') && !Request::is('briquettes/articles*') && !Request::is('briquettes/photos*') ? 'active' : '' }}"><a href="/briquettes/catalog" class="">каталог</a>
            </li>
            <li class="{{ Request::is('briquettes/prices') ? 'active' : '' }}"><a href="/briquettes/prices" class="">цены</a>
            </li>
            <li class="{{ Request::is('articles/briquettes*') ? 'active' : '' }}"><a href="/articles/briquettes" class="">статьи</a>
            </li>
            <li class="{{ Request::is('photos/briquettes*') ? 'active' : '' }}"><a href="/photos/briquettes" class="">фото</a>
            </li>
            @else
            <li class="{{ Request::is('boilers') ? 'active' : '' }}"><a href="/boilers" class="">котлы</a>
            </li>
            <li class="{{ Request::is('boilers/*') && !Request::is('boilers/prices') && !Request::is('boilers/articles*') && !Request::is('boilers/photos*') ? 'active' : '' }}"><a href="/boilers/catalog" class="">каталог</a>
            </li>
           {{--  <li class="{{ Request::is('boilers/prices') ? 'active' : '' }}"><a href="/boilers/prices" class="">цены</a>
            </li> --}}
            <li class="{{ Request::is('articles/boilers*') ? 'active' : '' }}"><a href="/articles/boilers" class="">статьи</a>
            </li>
            <li class="{{ Request::is('photos/boilers*') ? 'active' : '' }}"><a href="/photos/boilers" class="">фото</a>
            </li>
            @endif
    </ul>
</nav>
