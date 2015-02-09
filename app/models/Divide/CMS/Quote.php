<?php
namespace Divide\CMS;

class Quote extends \Eloquent
{
    protected $table = 'quotes';
    protected $fillable = ['quote', 'author'];
}