<?php

namespace Lurkchat\Tests;

use Lurkchat\Laravel\LurkchatBotServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LurkchatBotServiceProvider::class
        ];
    }
}
