@extends ('admin.layout') @section ('content')
<div class="page">
    <div class="container">
        <h1>Одностенные дымоходы</h1>
        <div class="divider"></div>
        <div class="row">
            @foreach($chimneys as $chimney)
            <div class="chimney">
                <div class="col-md-3">
                    <a href="#">
                        <img class="img-responsive item-img" src="{{ $chimney->img }}" alt="picture">
                    </a>
                </div>
                <div class="col-md-9">
                    <h3>{{ $chimney->name }}</h3>
                    <p>{{ $chimney->description }}</p>
                    <!--<a class="btn button" href="#">view project <span class="glyphicon glyphicon-chevron-right"></span></a>-->
                    <h5>Толщина: </h5>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked">0.5мм AISI 304
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">0.8мм AISI 304
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">1мм AISI 321
                    </label>
                </div>
                <div class="col-xs-12 table-block">
                    <table class="table table-bordered">
                        <thead style="font-weight: bold">
                            <tr>
                                <td>Димаметр</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                                <td>100/160</td> 
                            </tr>
                        </thead>
                        <tr>
                            <td>Труба</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                        </tr>
                        <tr>
                            <td>Труба</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                        </tr>
                        <tr>
                            <td>Труба</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                            <td>234</td>
                        </tr>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
