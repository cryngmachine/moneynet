<?php

namespace MoneyNet;

class Operation extends Moneynet
{
    private $_entity_id;
    private $_aggregation_id;
    private $_operation_id;
    private $_operation_type;
    private $_operation_status;
    private $_amount;
    private $_fee;
    private $_price_list_id;
    private $_operation_updated_at;
    private $_payment_method;
    private $_fee_details;
    private $_data;

    function operations($operationType = null)
    {
        $url = M_URL_API . "/operations";
        if ($operationType != null)
            $url .= "/$operationType";
        $this->setHeader();

        $this->get($url);

        if ($this->getStatusCode() == 200) {
            $this->_entity_id = $this->getBody()->entity_id;
            $this->_aggregation_id = $this->getBody()->aggregation_id;
            $this->_operation_id = $this->getBody()->operation_id;
            $this->_operation_type = $this->getBody()->operation_type;
            $this->_operation_status = $this->getBody()->operation_status;
            $this->_amount = $this->getBody()->amount;
            $this->_fee = $this->getBody()->fee;
            $this->_price_list_id = $this->getBody()->price_list_id;
            $this->_operation_updated_at = $this->getBody()->operation_updated_at;
            $this->_payment_method = $this->getBody()->payment_method;
            $this->_fee_details = $this->getBody()->fee_details;
            $this->_data = $this->getBody()->data;
        }
    }

    function getEntityId()
    {
        return $this->_entity_id;
    }

    function getAggregationId()
    {
        return $this->_aggregation_id;
    }

    function getOperationId()
    {
        return $this->_operation_id;
    }

    function getOperationType()
    {
        return $this->_operation_type;
    }

    function getOperationStatus()
    {
        return $this->_operation_status;
    }

    function getAmount()
    {
        return $this->_amount;
    }

    function getFee()
    {
        return $this->_fee;
    }

    function getPriceListId()
    {
        return $this->_price_list_id;
    }

    function getOperationUpdateAt()
    {
        return $this->_operation_updated_at;
    }
    function getPaymentMethod()
    {
        return $this->_payment_method;
    }
    function getFeeDetails()
    {
        return $this->_fee_details;
    }
    function getData()
    {
        return $this->_data;
    }
}
