<?php

namespace Lurkchat\Helpers;

use GuzzleHttp\Client;
use Lurkchat\Exceptions\InvalidRequestMethodException;

class Request
{

    /**
     * @param $url
     * @param $data
     * @param string $method
     * @return bool|string
     * @throws InvalidRequestMethodException
     */
    public static function make($url, array $data, $method = 'GET')
    {
        $method = strtolower($method);
        if (!in_array($method, ['post', 'get'])){
            throw new InvalidRequestMethodException();
        }

        $response = [
            'error' => 'Cannot get data from ' . $url
        ];

        try {
            $client = new Client();
            if($method == 'get') {
                $response = $client->get($url, [
                    'query' => $data
                ]);
            }else{
                $response = $client->post($url, [
                    'json' => $data
                ]);
            }

        }catch (\Exception $exception){
            if ($exception->getCode() == 400) {
                $response = $exception->getResponse();
            }
        }

        return json_decode((string) $response->getBody(), true);

    }

    /**
     * @param $url
     * @param array $data
     * @return bool|string
     */
    public static function get($url, array $data = [])
    {
        try {
            return self::make($url, $data);
        } catch (InvalidRequestMethodException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $url
     * @param $data
     * @return bool|string
     */
    public static function post($url, array $data = [])
    {
        try {
            return self::make($url, $data, 'POST');
        } catch (InvalidRequestMethodException $e) {
            return $e->getMessage();
        }
    }
}
