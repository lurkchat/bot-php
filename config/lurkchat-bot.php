<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bot Token
    |--------------------------------------------------------------------------
    |
    | Create your bot in messenger to get api token
    |
    */
    'token' => env('LURKCHAT_BOT_TOKEN', null),

    /*
    |--------------------------------------------------------------------------
    | Api base url
    |--------------------------------------------------------------------------
    |
    | In most cases you don't need to change this config
    |
    */
    'base_url' => env("LURKCHAT_BOT_BASE_URL", "https://lurkchat.com/api/v1")

];
