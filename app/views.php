<?php

View::composer('index', function ($view) {
    //$view->with('quotes',\Divide\CMS\Quote::all(['quote','author']));
    /*$view->with('quotes',\Divide\CMS\Quote::orderByRaw('RAND()')
        ->take(10)
        ->remember(1)
        ->get(['quote','author']));*/

    $quotes = Cache::remember('quotes', 1, function () {
        return \Divide\CMS\Quote::orderByRaw('RAND()')
            ->take(10)
            ->get(['quote', 'author']);
    });

    $view->with('quotes',$quotes);
});