<?php

namespace Parsidev\Novinways\Facades;

use Illuminate\Support\Facades\Facade;

class Novinways extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Parsidev\Novinways\Novinways::class;
    }
}