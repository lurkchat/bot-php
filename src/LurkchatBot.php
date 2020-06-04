<?php

namespace Lurkchat;

use Exception;
use Lurkchat\Exceptions\TokenNotProvidedException;
use Lurkchat\Helpers\Request;

class LurkchatBot {

    /**
     * Bot api key provided by LurkBot
     *
     * @var string
     */
    protected $token;

    /**
     * Lurkchat api url
     *
     * @var string
     */
    protected $baseUrl = 'https://lurkchat.com/api/v1';


    /**
     * Bot constructor.
     * @param $token
     * @param null $baseUrl
     */
    public function __construct($token = null, $baseUrl = null)
    {
        $this->make($token, $baseUrl);
    }

    /**
     * @param string $baseUrl
     * @return LurkchatBot
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $token
     * @return LurkchatBot
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     * @param null $baseUrl
     * @return LurkchatBot
     */
    public function make($token =null, $baseUrl = null)
    {

        // Try to set token from config if not provided
        if (!$token){
            try{
                $token = config('lurkchat-bot.token');
            }catch (Exception $exception){}
        }

        //Try to set url from config if not provided
        if (!$baseUrl){
            try{
                $baseUrl = config('lurkchat-bot.base_url');
            }catch (Exception $exception){}
        }

        if ($baseUrl) {
            $this->setBaseUrl($baseUrl);
        }

        return $this->setToken($token);;
    }

    /**
     * Get method url by it's name
     *
     * @param $methodName
     * @return string
     * @throws TokenNotProvidedException
     */
    protected function getMethodUrl($methodName)
    {
        if (!$this->token){
            throw new TokenNotProvidedException();
        }
        return $this->baseUrl . '/bot'. $this->token . '/'. $methodName;
    }

    /**
     * Get bot info
     *
     * @return bool|string
     * @throws TokenNotProvidedException
     */
    public function getMe()
    {
        $url = $this->getMethodUrl('getMe');
        return Request::get($url);
    }

    /**
     * @param $data
     * @return bool|string
     * @throws TokenNotProvidedException
     */
    public function sendMessage(array $data)
    {
        $url = $this->getMethodUrl('sendMessage');
        return Request::post($url, $data);
    }

    /**
     * @param $webhook
     * @return bool|string
     * @throws TokenNotProvidedException
     */
    public function setWebhook($webhook)
    {
        $url = $this->getMethodUrl('setWebhook');
        $data = ['webhook' => $webhook];
        return Request::post($url, $data);
    }

    /**
     * @return bool|string
     * @throws TokenNotProvidedException
     */
    public function deleteWebhook()
    {
        $url = $this->getMethodUrl('deleteWebhook');
        return Request::get($url);
    }

    /**
     * @return bool|string
     * @throws TokenNotProvidedException
     */
    public function checkWebhook()
    {
        $url = $this->getMethodUrl('checkWebhook');
        return Request::get($url);
    }

}
