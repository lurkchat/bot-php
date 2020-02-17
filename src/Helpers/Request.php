<?php

namespace Lurkchat\Helpers;

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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }else{
            $url = $url . '?'. http_build_query($data);
            curl_setopt($ch, CURLOPT_URL, $url);
        }

        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output);

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
