<?php

namespace Lurkchat\Tests\Unit;
use Lurkchat\Laravel\Facades\LurkchatBot;
use Lurkchat\Tests\TestCase;
use Lurkchat\LurkchatBot as Bot;

class LurkchatBotTest extends TestCase
{
    public $token = 'dummytoken123456';

    /**
     * Test facade returns right instance
     *
     * If everything is ok, we can continue using facade in our tests
     */
    public function testBotFacade()
    {
        $bot = LurkchatBot::make($this->token);
        $this->assertTrue($bot instanceof \Lurkchat\LurkchatBot);
    }

}
