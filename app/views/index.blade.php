@extends('_frontend.master')

@section('breadcrumb')
    {{ HTML::decode(Breadcrumbs::render('fooldal')) }}
@stop

@section('content')


    <div class="row">
        <div class="col-xs-4">
            <div class="side-menu">
                <img class="img-responsive"
                     src="{{URl::route('kep.show',['url'=>urlencode('assets/krisztus.jpg'),'width'=>400,'height'=>400]) }}"
                     alt="Jézus Krisztus"
                     title="Jézus Krisztus"/>
                {{$secondMenu->asUl(['class'=>'list-unstyled mainpage-menu'])}}
            </div>
            <div class="side-menu">
                <img class="img-responsive"
                     src="{{URl::route('kep.show',['url'=>urlencode('/img/gallery/2/1424029496.3997-nagybojt-2015.jpg'),'width'=>400,'height'=>400]) }}"
                     alt="Nagyböjt"
                     title="Nagyböjt"/>
                {{$thirdMenu->asUl(['class'=>'list-unstyled mainpage-menu'])}}
            </div>
        </div>
        <div class="col-xs-8">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-xs-6 articles-helper">
                        <div class="articles">
                            @if(count($article->gallery) && count($article->gallery->pictures))
                                <img class="img-responsive"
                                     src="{{URl::route('kep.show',['url'=>urlencode($article->gallery->pictures[0]->picture_path),'width'=>300,'height'=>200]) }}"
                                     alt="{{$article->gallery->pictures[0]->name}}"
                                     title="{{$article->gallery->pictures[0]->name}}"/>
                            @endif
                            <h4>{{HTML::link($article->getLink(),$article->title)}}</h4>

                            <p class="text-muted">{{$article->getCreatedAt()}}</p>

                            <div class="article-content-short">{{$article->getParragraph()}}</div>
                            {{HTML::linkRoute('hirek.show','Bővebben',array('id'=>$article->id,'title'=>\Str::slug($article->title)),array('class'=>'btn btn-sm btn-more'))}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if(count($event))
        <div class="row">
            <div class="col-xs-12">
                <div class="mainpage-divider">
                    <h3>Közelgő eseményünk</h3>
                    <hr>
                </div>


                <div class="event">
                    <div class="row">

                        @if(count($event->gallery) && count($event->gallery->pictures))
                            <div class="col-xs-4">
                                <img class="img-responsive"
                                     src="{{URl::route('kep.show',['url'=>urlencode($event->gallery->pictures[0]->picture_path),'width'=>300,'height'=>200]) }}"
                                     alt="{{$event->gallery->pictures[0]->name}}"
                                     title="{{$event->gallery->pictures[0]->name}}"/>
                            </div>
                        @endif
                        <div
                        @if(count($event->gallery) && count($event->gallery->pictures))
                            class="col-xs-8"
                            @else
                            class="col-xs-12"
                                @endif
                                >
                            <h4>{{HTML::linkRoute('esemenyek.show',$event->title,array('id'=>$event->id,'title'=>\Str::slug($event->title)))}}</h4>

                            <p class="small">Az esemény ideje: {{$event->getStartAt()}} - {{$event->getEndAt()}}</p>

                            <p>{{$event->getParragraph()}}</p>
                            {{HTML::linkRoute('esemenyek.show','Bővebben',array('id'=>$event->id,'title'=>\Str::slug($event->title)),array('class'=>'btn btn-sm btn-more'))}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-xs-12">
            <div class="mainpage-divider">
                <h3>A mai nap gondolata</h3>
                <hr>
            </div>


            <div class="quote-carousel owl-carousel">

                @foreach($quotes as $quote)
                    <div class="text-center">
                        <i class="fa fa-quote-left fa-4x quote-icon"></i>

                        <p class="qoute-text">{{{$quote->quote}}}</p>

                        <p class="qoute-author">- {{{$quote->author}}}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@stop