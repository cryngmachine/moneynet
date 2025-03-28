<?php

namespace MoneyNet;

include __DIR__ . "/../../config.php";

use MoneyNet\Rest;
use MoneyNet\ErrorRequest;

class Moneynet
{
    var String $token;
    var Rest $rest;
    var $header;
    function __construct($token)
    {
        $this->token = $token;
        $this->rest = new Rest();
    }

    function get(String $url)
    {
        $this->rest->get($url, $this->header);
    }

    function post(String $url,  $params)
    {

        $this->rest->post($url, $this->header, $params);
    }

    function getStatusCode()
    {
        return  $this->rest->getStatusCode();
    }

    function getBody()
    {

        return  $this->rest->getBody();
    }

    function errorRequest(): ErrorRequest
    {
        $errorRequest = new ErrorRequest($this->rest->getBody());
        return $errorRequest;
    }

    function setHeader()
    {
        $this->header = [
            // 'X-Schema-Name' => "MBS",
            //  'X-Schema-id' => time(),
            'Content-Type' => "application/json",
            'Authorization' => "Bearer " . $this->token
        ];
    }
}
