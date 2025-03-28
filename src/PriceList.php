<?php

namespace MoneyNet;

class PriceList extends Moneynet
{
    private $_price_lists;

    function priceLists($operationType = null, $id = 0)
    {
        $url = M_URL_API . "/pricelists";
        if ($operationType != null)
            $url .= "?operationType=$operationType";
        if ($id) {
            $url .= "/$id";
        }
        $this->setHeader();
        $this->get($url);

        if ($this->getStatusCode() == 200) {
            $this->_price_lists = $this->getBody();
        }
    }

    function getPriceLists()
    {
        return $this->_price_lists;
    }
}
