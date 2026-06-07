<?php

namespace BlackM13\Novinways\Facades;

use Illuminate\Support\Facades\Facade;

class Novinways extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BlackM13\Novinways\Novinways::class;
    }
}