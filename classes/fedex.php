<?php

class FedEx {

	protected $_service;
    protected $_currency;
	protected static $_instance = array();
    protected $_methods = array();
    protected $_base_request = array();
    protected $_last_request;

    public static function getServices()
    {
        $service_config = Kohana::$config->load('fedex.service');

        return array_keys($service_config);
    }

    public static function __callStatic($name, $arguments)
    {
		$service = $name;
        $currency = $arguments[0];

        if ( ! isset(FedEx::$_instance[$service][$currency]))
		{
            $currency_config = Kohana::$config->load('fedex.currency.'.$currency);
            $service_config = Kohana::$config->load('fedex.service.'.$service);

            if (empty($service_config))
                throw new Kohana_Exception('The FedEx Service has not been selected');

            if (empty($currency_config))
                throw new Kohana_Exception('The FedEx account currency has not been selected');

            FedEx::$_instance[$service][$currency] = new FedEx($service_config, $currency_config);
		}
		
		return FedEx::$_instance[$service][$currency];
	}

    private function __construct($service, $currency)
    {
        $this->_service = $service;
        $this->_currency = $currency;

        $this->_base_request['Version'] = array(
            'ServiceId' => $this->_service['serviceId'],
            'Major' => $this->_service['major'],
            'Intermediate' => $this->_service['intermediate'],
            'Minor' => $this->_service['minor'],
        );
        $this->_base_request['WebAuthenticationDetail']['UserCredential'] = array(
            'Key' => $this->_currency['key'],
            'Password' => $this->_currency['password'],
        );
        $this->_base_request['ClientDetail'] = array(
            'AccountNumber' => $this->_currency['shipAccount'],
            'MeterNumber' => $this->_currency['meterNumber'],
        );

        $wsdl = Kohana::$config->load('fedex.wsdldirectory').$this->_service['wsdl'];

        $soap_options = array();
        $soap_options['trace'] = true;
        $soap_options['exceptions'] = true;
        if (Kohana::$environment === Kohana::PRODUCTION) $soap_options['cache_wsdl'] = WSDL_CACHE_NONE;

        $this->_soapClient = new SoapClient($wsdl, $soap_options);
        $this->_soapClient->__setLocation($this->_currency['location'].$this->_service['location']);

        $methods = $this->_soapClient->__getFunctions();
        foreach ($methods as $method)
        {
            preg_match('/ ([a-zA-Z]+)\(/', $method, $matches);
            $this->_methods[] = $matches[1];
        }
    }

    public function getServiceMethods()
    {
        return $this->_methods;
    }

    public function getLastRequest()
    {
        return $this->_last_request;
    }

    public function __call($name, $arguments)
    {
        if (in_array($name, $this->_methods))
        {

            $this->_last_request = array_merge($this->_base_request, $arguments[0]);
            try
            { 
                $response = $this->_soapClient->$name($this->_last_request);
            } 
            catch (SoapFault $sf)
            { 
                throw new Kohana_Exception('FedEx SoapFault error: :message', array(':message' => $sf->getMessage()));
            } 
            catch (Exception $e)
            { 
                throw new Kohana_Exception('FedEx Exception error: :message', array(':message' => $e->getMessage()));
            }

            return $response;
        }
    }
}
