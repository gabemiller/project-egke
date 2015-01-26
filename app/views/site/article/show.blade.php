@extend('_frontend.master')

@section('page-title')
<h1>{{HTML::link($article->getLink(),$article->title)}}</h1>
<h4>
    <i class="fa fa-user"></i> {{$article->getAuthorName()}} <i class="fa fa-clock-o"></i> {{$article->getCreatedAt()}}
</h4>
@stop

@section('breadcrumb')
{{ HTML::decode(Breadcrumbs::render('hirek.show',$article)) }}
@stop

@section('content')
<div class="article">

    <h2 class="article-title">{{$article->title}}</h2>

    <div class="article-content">
        {{$article->content}}
    </div>

    <div>{{ Shareable::all() }}</div>

    @if(count($article->gallery)!=0 && count($article->gallery->pictures)!=0)
        <h4>Galéria</h4>

        <div class="article-gallery">
            <div class="article-carousel owl-carousel">
                @foreach($article->gallery->pictures as $picture)
                    <div>
                        <a href="{{URL::to($picture->picture_path)}}" title="{{$picture->name}}" data-gallery>
                            <img class="img-responsive" src="{{URL::to($picture->thumbnail_path)}}" alt="{{$picture->name}}"
                                 title="{{$picture->name}}"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'encsgorkathu'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>


</div>
@stop