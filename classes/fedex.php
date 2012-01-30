<?php

class FedEx {

	protected $_service;
    protected $_currency;
	protected static $_instance;
    protected $_methods = array();
    protected $_base_request = array();
    protected $_last_request;

	public static function instance($service, $currency)
	{
		if ( ! isset(FedEx::$_instance))
		{
            $currency = Kohana::$config->load('fedex.currency.'.$currency);
            $service = Kohana::$config->load('fedex.service.'.$service);

            if (empty($service))
                throw new Kohana_Exception('The FedEx Service has not been selected');

            if (empty($currency))
                throw new Kohana_Exception('The FedEx account currency has not been selected');

            FedEx::$_instance = new FedEx($service, $currency);
		}
		
		return FedEx::$_instance;
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

        $wsdl = realpath(str_replace('classes', 'wsdl', dirname(__FILE__)) . DIRECTORY_SEPARATOR . $this->_service['wsdl']);

        $soap_options = array();
        $soap_options['trace'] = true;
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

            return $this->_soapClient->$name($this->_last_request);
        }
    }
}
