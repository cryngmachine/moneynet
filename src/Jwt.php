<?php

namespace MoneyNet;

class Jwt
{
    private String $iss;
    private String $exp;
    private String $iat;
    private String $scope;
    private String $jti;
    private String $sub;
    private String $name;
    private String $entity_id;
    private String $network_user;
    private String $oi_prst;
    private String $oi_au_id;
    private String $client_id;
    private String $oi_tkn_id;

    function jwt_decode_without_verification($token)
    {
        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            return null; // Invalid token format
        }

        list($headb64, $payloadb64, $cryptob64) = $parts;

        $header = json_decode($this->base64UrlDecode($headb64), true);
        $payload = json_decode($this->base64UrlDecode($payloadb64), true);

        if ($header === null || $payload === null) {
            return null; // Invalid JSON
        }
        if (isset($payload['iss']))
            $this->iss = $payload['iss'];

        if (isset($payload['exp']))
            $this->exp = $payload['exp'];

        if (isset($payload['iat']))
            $this->iat = $payload['iat'];

        if (isset($payload['scope']))
            $this->scope = $payload['scope'];

        if (isset($payload['jti']))
            $this->jti = $payload['jti'];

        if (isset($payload['sub']))
            $this->sub = $payload['sub'];

        if (isset($payload['name']))
            $this->name = $payload['name'];

        if (isset($payload['entity-id']))
            $this->entity_id = $payload['entity-id'];

        if (isset($payload['network-user']))
            $this->network_user = $payload['network-user'];

        if (isset($payload['oi_prst']))
            $this->oi_prst = $payload['oi_prst'];

        if (isset($payload['oi_au_id']))
            $this->oi_au_id = $payload['oi_au_id'];

        if (isset($payload['client_id']))
            $this->client_id = $payload['client_id'];

        if (isset($payload['oi_tkn_id']))
            $this->oi_tkn_id = $payload['oi_tkn_id'];


        return $payload;
    }

    private function base64UrlDecode($input)
    {
        return base64_decode(str_pad(strtr($input, '-_', '+/'), strlen($input) % 4, '=', STR_PAD_RIGHT));
    }

    function getIss()
    {
        return $this->iss;
    }

    function getExp()
    {
        return $this->exp;
    }

    function getIat()
    {
        return $this->iat;
    }

    function getScope()
    {
        return $this->scope;
    }

    function getJti()
    {
        return $this->jti;
    }

    function getSub()
    {
        return $this->sub;
    }

    function getName()
    {
        return $this->name;
    }

    function getEntityId()
    {
        return $this->entity_id;
    }

    function getNetworkUser()
    {
        return $this->network_user;
    }

    function getOiPrst()
    {
        return $this->oi_prst;
    }

    function getOiAuId()
    {
        return $this->oi_au_id;
    }

    function getClientId()
    {
        return $this->client_id;
    }

    function getOiTknId()
    {
        return $this->oi_tkn_id;
    }



}
