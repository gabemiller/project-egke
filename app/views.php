<?php

View::composer('index', function ($view) {
    $quotes = Cache::remember('quotes', 1440, function () {
        return \Divide\CMS\Quote::orderByRaw('RAND()')
            ->take(10)
            ->get(['quote', 'author']);
    });

    $view->with('quotes',$quotes);
});