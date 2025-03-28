<?php

namespace MoneyNet;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;

class Rest
{
    var $client;

    var $response;
    function __construct()
    {
        $this->client = new Client();
    }

    function post(String $url, array $headers, $options)
    {

        $request = new Request('POST', $url, $headers);

        $this->send($request, $options);

        return $this;
    }

    function get(String $url, array $headers)
    {

        $request = new Request('GET', $url, $headers);

        $this->send($request);

        return $this;
    }

    function send(Request $request, array $options = [])
    {
        try {
            $this->response = $this->client->send($request, $options);
        } catch (ClientException $e) {
            //echo 'Errore del client: ' . $e->getResponse()->getStatusCode();
            $this->response = $e->getResponse();
        } catch (ServerException $e) {
            $this->response = $e->getResponse();
        } catch (RequestException $e) {
            // Gestisci altri errori di richiesta
            echo 'Errore di richiesta: ' . $e->getMessage();
        } catch (\Exception $e) {
            // Gestisci altre eccezioni (ad esempio, errori di rete)
            echo 'Errore generico: ' . $e->getMessage();
        }
    }

    function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    function getBody()
    {

        return json_decode($this->response->getBody());
    }
}
