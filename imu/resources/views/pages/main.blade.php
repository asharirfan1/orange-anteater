@extends('layout') @section('content')
<section class="section-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title"><span style="color: white; text-transform: uppercase"><img src="/images/logo2.png" class="logo logo-big">Тепло</span><b style="text-transform: uppercase; color: #ff543e">Квартал</b></h3>
                    <!--<div class="divider"></div>-->
                    <!--<h4 class="feature_sub" style="color: white">Виды деятельности</h4>-->
                    <div class="Contacts">
                        <div class="Contacts__item"><span>Александр: </span><strong> &nbsp;<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;(095) 57-57-677</strong></div>
                        <div class="Contacts__item" style="padding-left: 100px"> <strong> &nbsp;<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;(097) 87-161-97</strong></div>
                        <div class="Contacts__item" style="padding-left: 100px"> <strong> &nbsp;<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;kozatskyy1983@gmail.com</strong></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="feature-tab">
                <div class="col-md-6">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="chimneys">
                            <img src="/images/chimneys1.png" alt="" class="img-responsive">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="briquettes">
                            <img src="/images/briquettes.png" alt="" class="img-responsive">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="boilers">
                            <img src="/images/boilers1.png" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <h3 class="subheading_main">Что вас интересует?</h3>
                        <li role="presentation">
                            <a href="chimneys">
                                <div class="col-sm-12 single-feature">
                                    <div class="col-sm-2 feature-icon">
                                        <img src="/images/icons/chimney.png">
                                    </div>
                                    <div class="col-sm-10 feature-content">
                                        <h4>Дымоходы</h4>
                                        <p>Пару слов о дымоходах</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="briquettes">
                                <div class="col-sm-12 single-feature">
                                    <div class="col-sm-2 feature-icon">
                                        <img src="/images/icons/briquette.png">
                                    </div>
                                    <div class="col-sm-10 feature-content">
                                        <h4>Брикеты</h4>
                                        <p>Пару слов о брикетах</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="boilers">
                                <div class="col-sm-12 single-feature">
                                    <div class="col-sm-2 feature-icon">
                                        <img src="/images/icons/boiler.png">
                                    </div>
                                    <div class="col-sm-10 feature-content">
                                        <h4>Котлы</h4>
                                        <p>Пару слов о котлах Пару слов о котлахПару слов о котлаПару слов о котлаПару слов о котлаххх</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
