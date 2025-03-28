<?php

namespace MoneyNet;



class Oauth extends Rest
{
    var $url;
    function master(String $username, String $password, String $networkUser)
    {
        $url = M_URL_LOGIN . '/connect/token';
        $credentials = base64_encode("$username:$password");
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Basic $credentials",
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => 'offline_access',
                'network_user' => $networkUser
            ]
        ];
        $this->post($url, $headers, $options);
        return $this;
    }

    function agent(String $username, String $password, String $code)
    {
        $url = M_URL_LOGIN . '/connect/token';
        $credentials = base64_encode("$username:$password");
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Basic $credentials",
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'redirect_uri' => M_REDIRECT_URI,
                'code' => $code
            ]
        ];
        $this->post($url, $headers, $options);
        return $this;
    }


    function authorize(String $client_id)
    {
        $this->url = M_URL_LOGIN . "/connect/authorize?client_id=$client_id&response_type=code&redirect_uri=" . M_REDIRECT_URI . "&state=" . md5(uniqid());
        return $this;
    }

    function token()
    {

        return $this->getBody()->access_token;
    }

    function getUrl()
    {
        return $this->url;
    }
}
