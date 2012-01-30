FedEx API For Kohana 3+
=======================

Supports multiple FedEx services (WSDLs) and multiple accounts (currency and development/live).

For more information on FedEx API:

[http://www.fedex.com/us/developer/](http://www.fedex.com/us/developer/)

Usage:
------

View services methods:

    FedEx::instance('AddressValidationService', 'USD')->getServiceMethods();

    = "addressValidation"

Send request:

    $request = array(
        'RequestTimestamp' => date("c"),
        'Options' => NULL,
        'AddressesToValidate' => array(
            'Address' => array(
                'StreetLines' => array(),
                'City' => NULL,
                'StateOrProvinceCode' => NULL,
                'PostalCode' => NULL,
                'CountryCode' => NULL,
            ),
        ),
    );
    FedEx::instance('AddressValidationService', 'USD')->addressValidation($request);

View last request:

    FedEx::instance('AddressValidationService', 'USD')->getLastRequest();
