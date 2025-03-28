<?php

namespace MoneyNet;

class Pagopa extends Moneynet
{

    var  $_id;
    var  $_outcome;
    var  $_payment_description;
    var  $_fiscal_code_pa;
    var  $_company_name;
    var  $_office_name;
    var  $_payment_list;

    function verify(String $qr_code)
    {
        $url = M_URL_API . "/pagopa/verify";
        $this->setHeader();
        $notice_data = explode("|", $qr_code);
        $body = [
            'json' => [
                'qr_code' => $qr_code,
                'notice_data' => [
                    'notice_number' => $notice_data[2],
                    'amount' => ltrim($notice_data[4],'0')/100,
                    'pa_fiscal_code' => $notice_data[3],

                ]
            ],
        ];

        $this->post($url, $body);
        if ($this->getStatusCode() == 200) {
            $this->_id = $this->getBody()->id;
            $this->_outcome = $this->getBody()->outcome;
            $this->_payment_description = $this->getBody()->payment_description;
            $this->_fiscal_code_pa = $this->getBody()->fiscal_code_pa;
            $this->_company_name = $this->getBody()->company_name;
            $this->_office_name = $this->getBody()->office_name;
            $this->_payment_list = $this->getBody()->payment_list;
        }
    }

    function getId()
    {
        return $this->_id;
    }

    function getOutcome()
    {
        return $this->_outcome;
    }

    function getPaymentDescription()
    {
        return $this->_payment_description;
    }

    function getFiscalCodePa()
    {
        return $this->_fiscal_code_pa;
    }

    function getCompanyName()
    {
        return $this->_company_name;
    }

    function getOfficeName()
    {
        return $this->_office_name;
    }

    function getPaymentList()
    {
        return $this->_payment_list;
    }
}
