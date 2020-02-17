<?php

namespace Lurkchat\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class LurkchatBot extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lurkchat-laravel-bot';
    }
}
