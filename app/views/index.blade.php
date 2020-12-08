@extends('_frontend.master')

@section('breadcrumb')
    {{ HTML::decode(Breadcrumbs::render('fooldal')) }}
@stop

@section('content')


    <div class="row">
        <div class="col-xs-4">
            <div class="side-menu">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/SRQ9DYmYpWU"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
            <div class="side-menu">
                <img class="img-responsive"
                     src="{{URl::route('kep.show',['url'=>urlencode('/assets/krisztus.jpg'),'width'=>400,'height'=>400]) }}"
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
            <div>
                <img class="img-responsive"
                     src="{{URl::route('kep.show',['url'=>urlencode('/assets/meghivo.jpg'),'width'=>900,'height'=>205]) }}"
                     alt="Nagyböjt"
                     title="Nagyböjt"/>
                <h3 class="text-center color-yellow">Meghívó</h3>
                <p>Minden megkeresztelt ember, annak az új életnek a tanúja, amit Krisztus adott nekünk az Egyháza révén.
                    A görögkatolikus egyházunk tudatában van, hogy sok jó ember él a keresztény egyházon kívül is,
                    de csak Jézus Krisztus képes Istenhez legközelebb vinni bennünket, a többi vallás nem képes erre.
                    A görögkatolikus egyház, nem csupán tanok összessége, rituális gyakorlatok és szokások, hanem egy életforma,
                    a krisztusi élet. A mi hitünk maga az ÉLET. Ez egy olyan élet, ami igazabb, teljesebb, bőséges és hitelesebb,
                    mint bármely élet.Ez az ÉLET az örök, aminek nincs vége, amely fölött még a halálnak sincs hatalma.</p>
                <p class="text-center">Szeretettel meghívom: csatlakozzon hozzánk, hogy részesülhessen a Krisztusban való új életbe.</p>
                <h4 class="text-center color-yellow">Isten hozta új otthonába!</h4>
                <p class="text-center">Görögkatolikus, aki eddig nem volt aktív a hitéletbe? Nem tagja egyik egyháznak sem,
                    vagy amibe keresztelték nem érzi magát otthon?Ezt a különleges meghívást szeretném önnek átadni:</p>
                <h4 class="text-center color-yellow">Jöjjön velünk!</h4>
                <p class="text-center">Kölcsönösen szükségünk van egymásra,<br>
                   szeretnénk, ha családunk tagja lenne!<br>
                   Pacsai János parókus</p>
            </div>
        </div>
        <div class="col-xs-8">
            <div id="articles" class="row">
                @foreach($articles as $article)
                    <div class="col-xs-6 article-item">
                        <div class="articles">
                            @if(count($article->gallery) && count($article->gallery->pictures))
                                <img class="img-responsive"
                                     src="{{URl::route('kep.show',['url'=>urlencode($article->gallery->pictures[0]->picture_path),'width'=>300,'height'=>200]) }}"
                                     alt="{{$article->gallery->pictures[0]->name}}"
                                     title="{{$article->gallery->pictures[0]->name}}"/>
                            @endif
                            <h3>{{HTML::linkRoute('hirek.show',$article->title,array('id'=>$article->id,'title'=>\Str::slug($article->title)))}}</h3>

                            <p class="text-muted">{{$article->getCreatedAt()}}</p>

                            <p class="article-content">{{$article->getParragraph()}}</p>
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
                            <h3>{{HTML::linkRoute('esemenyek.show',$event->title,array('id'=>$event->id,'title'=>\Str::slug($event->title)))}}</h3>

                            <p class="text-muted">Az esemény ideje: {{$event->getStartAt()}} - {{$event->getEndAt()}}</p>

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