<header id="header" class="navbar-inverse navbar-fixed-top video-menu" role="banner">
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
        @include ('partials.nav')
    </div>
    <div class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5" style="padding-right: 0">
                    <a class="btn btn-success btn-lg pull-left order-header-button" href="/pages/order" role="button">заявка</a>
                    @if ( request::is('chimneys*') )
                        @include ('partials.search', ['action' => '/chimneys/search', 'placeholder' => 'найти дымоход'])
                    @elseif ( Request::is('briquettes*'))
                        @include ('partials.search', ['action' => '/briquettes/search', 'placeholder' => 'найти брикет'])
                    @elseif ( Request::is('boilers*'))
                        @include ('partials.search', ['action' => '/boilers/search', 'placeholder' => 'найти котел'])
                    @elseif ( Request::is('articles*') )
                        @include ('partials.search', ['action' => '/articles/' . $productName . '/search', 'placeholder' => 'найти статью'])
                    @elseif ( Request::is('photos*') )
                        @include ('partials.search', ['action' => '/photos/' . $productName . '/search', 'placeholder' => 'найти фото'])
                    @elseif ( Request::is('pages/questions*') )
                        @include ('partials.search', ['action' => '/pages/questions/search', 'placeholder' => 'найти вопрос'])
                    @endif
                </div>
                <div class="col-sm-12 col-md-7" style="padding-right: 0; padding-left: 0">
                    <div class="contacts">
                        <span><i class="fa fa-phone" aria-hidden="true"></i> (095) 57-57-677</span>
                        <span><i class="fa fa-phone" aria-hidden="true"></i> (097) 87-161-97</span>
                        <span><i class="fa fa-envelope" aria-hidden="true"></i> kozatskyy1983@gmail.com</span>
                    </div>
                </div>
                <!--                <div class="col-sm-12 col-md-6">
                    <ul class="submenu">
                        <li><a href="/chimneys/одностенный">одностенные</a></li>
                        <li><a href="/chimneys/утепленный">утепленные</a></li>
                        <li><a href="/chimneys/алюком">алюком</a></li>
                        <li><a href="/chimneys/керамический">керамические</a></li>
                    </ul>
                </div>
            </div>-->
            </div>
        </div>
    </div>
</header>
