<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 30/09/2018
 * Time: 11:49
 */

class BuscaCEP
{
    private $url = "viacep.com.br/ws/%s/json/";

    public function find($cep)
    {
        $url = $this->mountURL($cep);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);

        curl_close($ch);

        return json_decode($result, true);
    }

    private function mountURL($cep)
    {
        $cep = str_replace('-', '', $cep);
        $url = sprintf($this->url, $cep);

        return $url;
    }

}