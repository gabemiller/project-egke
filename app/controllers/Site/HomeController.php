<?php

namespace Site;

use Divide\CMS\Article;
use Divide\CMS\Event;
use View;

class HomeController extends \BaseController {

    protected $layout = '_frontend.master';

    /**
     * Display a listing of the resource.
     * GET /site\index
     *
     * @return Response
     */
    public function index() {
        View::share('title', 'Főoldal');

        $article = Article::where('published', '=', true)
            ->orderBy('created_at', 'DESC')
            ->select(['id', 'title', 'author_id', 'created_at', 'content','gallery_id'])
            ->take(6)->get();

        $event = Event::orderBy('created_at','desc')
            ->limit(1)
            ->get(['id', 'title', 'created_at', 'content','start_at','end_at','gallery_id']);

        $this->layout->content = View::make('index')
            ->with('articles', $article)
            ->with('event',$event);
    }

}
