@extends('_frontend.master')

@section('breadcrumb')
    {{ HTML::decode(Breadcrumbs::render('fooldal')) }}
@stop

@section('content')


    <div class="row">
        @foreach($articles as $article)
            <div class="col-xs-4">
                <div class="articles">
                    @if(count($article->gallery) && count($article->gallery->pictures))
                        <img class="img-responsive" src="{{URl::route('kep.show',['name'=>$article->gallery->pictures[0]->name,'id'=>$article->gallery->pictures[0]->gallery_id]) }}"
                             alt="{{$article->gallery->pictures[0]->name}}"
                             title="{{$article->gallery->pictures[0]->name}}"/>
                    @endif
                    <!--img class="img-responsive" src="http://placehold.it/300x200/468966/FFF0A5"-->
                    <h4>{{HTML::link($article->getLink(),$article->title)}}</h4>

                    <div class="article-content-short">{{$article->content}}</div>
                    {{HTML::linkRoute('hirek.show','Bővebben',array('id'=>$article->id,'title'=>\Str::slug($article->title)),array('class'=>'btn btn-sm btn-more'))}}
                </div>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-xs-12">

        </div>
    </div>

    <!--div class="row">
    <div class="col-xs-12">
        <div class="owl-carousel">
            @for($i=0;$i<10;$i++)
            <div class="text-center">
                <i class="fa fa-quote-left fa-4x"></i>
                <p>Valles nix umentia sorbentur subsidere viseret. Ut ventos moderantum erat: capacius caeleste minantia foret! Ora grandia moderantum formas gentes. Circumfluus tellure aurea fecit timebat nullus lanient. Nec ponderibus dei retinebat posset: tenent duris sata.</p>
                <p>- Subsidere Viseret</p>
            </div>
            @endfor
            </div>
        </div>
    </div-->

@stop