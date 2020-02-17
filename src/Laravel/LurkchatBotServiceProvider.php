<?php

namespace Lurkchat\Laravel;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Lurkchat\LurkchatBot;

class LurkchatBotServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/lurkchat-bot.php' => config_path('lurkchat-bot.php')
        ], 'config');
    }

    public function register()
    {
        App::bind('lurkchat-laravel-bot', function (){
            return new LurkchatBot();
        });
    }
}
