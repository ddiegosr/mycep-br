<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 30/09/2018
 * Time: 11:49
 */

class BuscaCEP
{
    private static $url = "viacep.com.br/ws/%s/json/";

    public static function find($cep)
    {
        $url = self::mountURL($cep);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }

    private static function mountURL($cep)
    {
        $cep = str_replace('-', '', $cep);
        $url = sprintf(self::$url, $cep);

        return $url;
    }

}