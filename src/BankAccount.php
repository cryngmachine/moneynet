<?php

namespace MoneyNet;

class BankAccount extends Moneynet
{
    private $_iban;
    private $_availableBalance;
    private $_accountingBalance;

    private $_id;
    private $_value_date;
    private $_transfer_number;
    private $_ordering_reference;

    function balance($iban)
    {
        $url = M_URL_API . "/bank-account/balance/$iban";
        $this->setHeader();

        $this->get($url);

        if ($this->getStatusCode() == 200) {
            $this->_iban = $this->getBody()->iban;
            $this->_availableBalance = $this->getBody()->available_balance;
            $this->_accountingBalance = $this->getBody()->accounting_balance;
        }
    }





    function executeTransfer(String $order_entity, String $ordering_entity_id, String $beneficiary_entity, String $beneficiary_entity_id, String $value_date, int $amount, String $reason)
    {
        $url = M_URL_API . "/bank-account/execute-transfer";
        $this->setHeader();
        $body = [
            'json' => [
                'order_entity' => $order_entity,
                'ordering_entity_id' => $ordering_entity_id,
                'beneficiary_entity' => $beneficiary_entity,
                'beneficiary_entity_id' => $beneficiary_entity_id,
                'value_date' => $value_date,
                'amount' => $amount,
                'reason' => $reason,
            ]
        ];
        $this->post($url, $body);
        if ($this->getStatusCode() == 200) {
            $this->_id = $this->getBody()->id;
            $this->_value_date = $this->getBody()->value_date;
            $this->_transfer_number = $this->getBody()->transfer_number;
            $this->_ordering_reference = $this->getBody()->ordering_reference;
        }
    }

    function getIban()
    {
        return  $this->_iban;
    }

    function getAvailableBalance()
    {
        return  $this->_availableBalance;
    }

    function getAccountingBalance()
    {
        return  $this->_accountingBalance;
    }

    function getId()
    {
        return $this->_id;
    }

    function getValueDate()
    {
        return $this->_value_date;
    }
    function getTransferNumber()
    {
        return $this->_transfer_number;
    }

    function getOrderingReference()
    {
        return $this->_ordering_reference;
    }
}
