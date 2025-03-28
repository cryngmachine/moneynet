<?php

namespace MoneyNet;

class Basket extends Moneynet
{

    private $_Id;
    private $_Operations;
    private $_valid_payment_methods;
    private $_status;

    function create()
    {
        $url = M_URL_API . '/basket/create';
        $this->setHeader();
        $body = ['json' => '{}'];
        $this->post($url, $body);

        
        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_Operations = $this->getBody()->operations;
        }
    }

    function getBasket($id)
    {
        $url = M_URL_API . "/basket/$id";
        $this->setHeader();

        $this->get($url);

        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_Operations = $this->getBody()->operations;
        }
    }


    function add(String $basket_id, String $operation_id, int $amount, int $fee, String $price_list_id)
    {
        $url = M_URL_API . "/basket/add";
        $this->setHeader();

        $body = [
            'json' => [
                'basket_id' => $basket_id,
                'operation_id' => $operation_id,
                'amount' => $amount,
                'fee' => $fee,
                'price_list_id' => $price_list_id
            ],
        ];
        $this->post($url, $body);

        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_Operations = $this->getBody()->operations;
        }
    }

    function remove(String $basket_id, String $operation_id)
    {
        $url = M_URL_API . "/basket/remove";
        $this->setHeader();

        $body = [
            'json' => [
                'basket_id' => $basket_id,
                'operation_id' => $operation_id,
            ],
        ];
        $this->post($url, $body);

        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_Operations = $this->getBody()->operations;
        }
    }

    function validate(String $basket_id)
    {
        $url = M_URL_API . "/basket/validate";
        $this->setHeader();

        $body = [
            'json' => [
                'basket_id' => $basket_id
            ],
        ];
        $this->post($url, $body);

        if ($this->getStatusCode() == 200) {
            $this->_valid_payment_methods = $this->getBody()->valid_payment_methods;
        }
    }

    function complete(String $basket_id, String $payment_method, String $money_source)
    {
        $url = M_URL_API . "/basket/complete";
        $this->setHeader();

        $body = [
            'json' => [
                'basket_id' => $basket_id,
                'payment_method' => $payment_method,
                'money_source' => $money_source,
            ],
        ];
        $this->post($url, $body);

        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_status = $this->getBody()->status;
            $this->_Operations = $this->getBody()->operations;
            
        }
    }


    function closeAsFailed(String $basket_id, String $payment_method, String $money_source)
    {
        $url = M_URL_API . "/basket/close-as-failed";
        $this->setHeader();

        $body = [
            'json' => [
                'basket_id' => $basket_id,
                'payment_method' => $payment_method,
                'money_source' => $money_source,
            ],
        ];
        $this->post($url, $body);

        if ($this->getStatusCode() == 200) {
            $this->_Id = $this->getBody()->id;
            $this->_status = $this->getBody()->status;
            $this->_Operations = $this->getBody()->operations;
        }
    }

    function getId()
    {
        return $this->_Id;
    }

    function getOperations()
    {
        return $this->_Operations;
    }

    function getValidPaymentMethods()
    {
        return $this->_valid_payment_methods;
    }

    function getStatus()
    {
        return $this->_status;
    }
}
