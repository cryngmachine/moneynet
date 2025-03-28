<?php

namespace MoneyNet;

class Network extends Moneynet
{

    private $_id;
    private $_code;
    private $_name;
    private $_description;
    private $_ibans;
    private $_sub_networks;
    private $_parent_network;
    private $_agency_infos;


    function myInfo()
    {
        $url = M_URL_API . '/networks/my-info';

        $this->setHeader();
        $this->get($url);

        if ($this->getStatusCode() == 200) {
            $this->_id = $this->getBody()->id;
            $this->_code = $this->getBody()->code;
            $this->_name = $this->getBody()->name;
            $this->_description = $this->getBody()->description;
            $this->_ibans = $this->getBody()->ibans;
            $this->_sub_networks = $this->getBody()->sub_networks;
            $this->_parent_network = $this->getBody()->parent_network;
            $this->_agency_infos = $this->getBody()->agency_infos;
        }
    }


    function subNetwork(String $id)
    {
        $url = M_URL_API . "/networks/subnetwork/$id";

        $this->setHeader();
        $this->get($url);
        if ($this->getStatusCode() == 200) {
            $this->_id = $this->getBody()->id;
            $this->_code = $this->getBody()->code;
            $this->_name = $this->getBody()->name;
            $this->_description = $this->getBody()->description;
            $this->_ibans = $this->getBody()->ibans;
            $this->_sub_networks = $this->getBody()->sub_networks;
            $this->_parent_network = $this->getBody()->parent_network;
            $this->_agency_infos = $this->getBody()->agency_infos;
        }
    }

    /*PARAMETRI DI RISPOSTA myINFO */
    function getId()
    {
        return $this->_id;
    }

    function getCode()
    {
        return $this->_code;
    }

    function getName()
    {
        return $this->_name;
    }

    function getDescription()
    {
        return $this->_description;
    }

    function getibans()
    {
        return $this->_ibans;
    }

    function getSubNetworks()
    {
        return $this->_sub_networks;
    }

    function getParentNetwork()
    {
        return $this->_parent_network;
    }

    function getAgencyInfos()
    {
        return $this->_agency_infos;
    }
    /* END PARAMETRI DI RISPOSTA myINFO */
}
