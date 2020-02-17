<p><img src="https://lurkchat.com/assets/img/logo.png" height="100px"></p>


## About Lurkchat

Lurkchat is reliable, secure and anonymous messenger.

Visit [lurkchat.com](https://lurkchat.com)

Sign up for free without email and other sensitive data and have pleasure with messaging and many other features


## Welcome to Lurkchat bot

### Getting started

#### Install the package

##### Using composer require
```
composer require lurkchat/bot-php
```

##### Or add to your composer.json file
```
...
"require": {
    ...
    "lurkchat/bot-php": "^1.0"
}
```
##### and run
```
composer install
```

### Usage example

#### Standalone
```php
require_once("vendor/autoload.php");

$token = %YOUR_BOT_TOKEN%;

$bot = new \Lurkchat\LurkchatBot($token);
```

#### In laravel

##### Service provider and 'LurkchatBot' alias are auto discovered so just publish config file

```
php artisan vendor:publish --provider="Lurkchat\Laravel\LurkchatBotServiceProvider" --tag="config"
```

##### If you use only 1 bot, add to .env file and this config will be used for default
```
LURKCHAT_BOT_TOKEN=%YOUR_BOT_TOKEN%
```

##### If you use multiple bots, you can provide token for each bot
```php
use Lurkchat\Laravel\Facades\LurkchatBot;

$bot = LurkchatBot::make($token);
```

### Make API call

#### Standalone
```php
$bot = new \Lurkchat\LurkchatBot($token);

$info = $bot->getMe();
```

#### In laravel

##### With token provided in .env
```php
$info = LurkchatBot::getMe();
```

##### With token provided for each bot
```php
$info = LurkchatBot::make($token)->getMe();
```

### Please check the docs for more commands
