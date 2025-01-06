<div class="footer_b">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="Footer__menu">
                    <a href="/pages/questions" class="Footer__menu-link">
                        <li class="Footer__menu-item">вопросы</li>
                    </a>
                    @if ( count($pages) )
                        @foreach ($pages as $page)
                            <a href="/pages/{{ $page->id }}" class="Footer__menu-link">
                                <li class="Footer__menu-item">{{ $page->name }}</li>
                            </a>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-6" style="text-align: right">
                <div class="footer_bottom">
                    <p class="text-block">© Теплоквартал 2016</p>
                </div>
            </div>
            <!--<div class="col-md-6">
                    <div class="footer_mid pull-right">
                        <ul class="social-contact list-inline">
                            <li> <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li> <a href="#"><i class="fa fa-rss"></i></a>
                            </li>
                            <li> <a href="#"><i class="fa fa-google-plus"></i> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>-->
        </div>
    </div>
</div>
