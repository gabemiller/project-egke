@extends('_frontend.master')
@section('breadcrumb')
    {{-- HTML::decode(Breadcrumbs::render('hirek.index')) --}}
@stop
@section('content')
    <div id="articles" class="row">
        @foreach($articles as $article)
            <div class="col-xs-4 articles-item">
                <div class="articles">
                    @if(count($article->gallery) && count($article->gallery->pictures))
                        <img class="img-responsive"
                             src="{{URl::route('kep.show',['url'=>urlencode($article->gallery->pictures[0]->picture_path),'width'=>300,'height'=>200]) }}"
                             alt="{{$article->gallery->pictures[0]->name}}"
                             title="{{$article->gallery->pictures[0]->name}}"/>
                    @endif
                    <h4>{{HTML::link($article->getLink(),$article->title)}}</h4>

                    <p class="text-muted">{{$article->getCreatedAt()}}</p>

                    <p class="article-content">{{$article->getParragraph()}}</p>
                    {{HTML::linkRoute('hirek.show','Bővebben',array('id'=>$article->id,'title'=>\Str::slug($article->title)),array('class'=>'btn btn-sm btn-more'))}}
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {{$articles->links();}}
    </div>
@stop