<?php

namespace MoneyNet;

class ErrorRequest
{

    private  String $_type;
    private  String $_title;
    private   $_status;
    private  String $_detail;
    private  String $_instance;
    private  String $_additionalProp1;
    private  String $_additionalProp2;
    private  String $_additionalProp3;
    private  String $_traceId;
    private $_errors;
    private $body;
    function __construct(object $body)
    {
        $this->body = $body;
        var_dump($this->body);
        $this->_type = $body->type;
        $this->_title = $body->title;
        $this->_status = $body->status;
        $this->_traceId = $body->traceId;
        if (isset($body->detail))
            $this->_detail = $body->detail;
        if (isset($body->errors))
            $this->_errors = $body->errors;

        // $this->_instance = $body->instance;
        // $this->_additionalProp1 = $body->additionalProp1;
        // $this->_additionalProp2 = $body->additionalProp2;
        // $this->_additionalProp3 = $body->additionalProp3;
    }

    function getType()
    {
        return $this->_type;
    }

    function  getTitle()
    {
        return $this->_title;
    }

    function getStatus()
    {
        return $this->_status;
    }
    function getDetail()
    {
        return $this->_detail;
    }
    function getIstance()
    {
        return $this->_instance;
    }
    function getAdditionalProp1()
    {
        return $this->_additionalProp1;
    }
    function getAdditionalProp2()
    {
        return $this->_additionalProp2;
    }
    function getAdditionalProp3()
    {
        return $this->_additionalProp3;
    }
    function getTraceId()
    {
        return $this->_traceId;
    }
    function getErrors()
    {
        return $this->_errors;
    }

    function getFullMessage()
    {
        return $this->body;
    }
}
