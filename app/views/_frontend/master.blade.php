<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns#">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="3YPTezKlD-bwLmtO8uCtl7tyu7i0x0l2RsmQ-3Ipu_k" />


    <link href="/assets/favicon.ico" rel="icon" type="image/x-icon"/>
    <title>{{Setting::get('site-title')}} @if(!empty($title)) {{'- '.$title }} @endif</title>

    <!--[if lt IE 9]>
    {{ HTML::script('//html5shim.googlecode.com/svn/trunk/html5.js') }}
    <![endif]-->

    {{HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css')}}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/divide.min.css') }}

    @if(isset($am)&&!empty($am))
        {{ HTML::style('css/divide.am.min.css') }}
    @endif

</head>
<body>

@include('_frontend.lightbox')
@include('_frontend.header')
<div class="container main-container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            @yield('breadcrumb')
        </div>
        <div class="col-md-6 col-lg-6">
            @if(isset($am)&&!empty($am))
                {{HTML::link('/akadalymentes/torol','Normál nézet',['class'=>'btn-am'])}}
            @else
                {{HTML::link('/akadalymentes/letrehoz','Akadálymentes nézet',['class'=>'btn-am'])}}
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @yield('content')
        </div>
    </div>
</div>
@include('_frontend.footer')


{{ HTML::script('js/jquery-2.1.1.min.js'); }}
{{ HTML::script('js/bootstrap.min.js'); }}
{{ HTML::script('js/divide.min.js'); }}

</body>
</html>
