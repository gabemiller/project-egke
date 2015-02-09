<?php

View::composer('index',function($view){
    $view->with('quotes',\Divide\CMS\Quote::all(['quote','author']));
});