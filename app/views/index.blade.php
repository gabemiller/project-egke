@extends('_frontend.master')

@section('page-title')
<img src="assets/smgkob_white_mini.svg" height="300">
@stop

@section('breadcrumb')
{{ HTML::decode(Breadcrumbs::render('fooldal')) }}
@stop

@section('content')


<div class="row">
    @foreach($articles as $article)
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="articles">
            <img class="img-responsive" src="http://placehold.it/300x200/468966/FFF0A5">
            <h4>{{HTML::link($article->getLink(),$article->title)}}</h4>
            <div class="article-content-short">{{$article->content}}</div>
            {{HTML::linkRoute('hirek.show','Bővebben',array('id'=>$article->id,'title'=>\Str::slug($article->title)),array('class'=>'btn-article-more'))}}
        </div>
    </div>
    @endforeach
</div>


@stop