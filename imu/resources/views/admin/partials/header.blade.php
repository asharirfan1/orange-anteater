<header id="header" class="navbar-inverse video-menu" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1 class="feature_title nav-logo"><a href="/"><span style="color: white"><img src="/images/logo2.png" class="logo">Тепло</span><b style="color: #ff543e">Квартал</b></a></h1>
        </div>
        @include ('admin.partials.nav')
</div>
    <div class="top-line" id="chimneys">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if ( Request::is('admin/chimneys*') )
                        @include ('partials.search', ['action' => '/admin/chimneys/search', 'placeholder' => 'найти дымоход'])
                    @elseif ( Request::is('admin/briquettes*'))
                        @include ('partials.search', ['action' => '/admin/briquettes/search', 'placeholder' => 'найти брикет'])
                    @elseif ( Request::is('admin/boilers*'))
                        @include ('partials.search', ['action' => '/admin/boilers/search', 'placeholder' => 'найти котел'])
                    @elseif ( Request::is('admin/articles*'))
                        @include ('partials.search', ['action' => '/admin/articles/search', 'placeholder' => 'найти статью'])
                    @elseif ( Request::is('admin/photos*'))
                        @include ('partials.search', ['action' => '/admin/photos/search', 'placeholder' => 'найти фото'])
                    @elseif ( Request::is('admin/orders*'))
                        @include ('partials.search', ['action' => '/admin/orders/search', 'placeholder' => 'найти заявку'])
                    @elseif ( Request::is('admin/questions*'))
                        @include ('partials.search', ['action' => '/admin/questions/search', 'placeholder' => 'найти вопрос'])
                    @elseif ( Request::is('admin/pages*'))
                        @include ('partials.search', ['action' => '/admin/pages/search', 'placeholder' => 'найти страницу'])
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
