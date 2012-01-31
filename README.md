FedEx API For Kohana 3+
=======================

Supports multiple FedEx services (WSDLs) and multiple accounts (currency and development/live).

For more information on FedEx API and WSDL files:

[http://www.fedex.com/us/developer/](http://www.fedex.com/us/developer/)

Usage:
------

View services:

    FedEx::getServices()

    array(10) (
        0 => string(24) "AddressValidationService"
        1 => string(12) "CloseService"
        2 => string(14) "LocatorService"
        3 => string(33) "PackageMovementInformationService"
        4 => string(13) "PickupService"
        5 => string(11) "RateService"
        6 => string(16) "ReturnTagService"
        7 => string(11) "ShipService"
        8 => string(12) "TrackService"
        9 => string(21) "UploadDocumentService"
    )

View services methods:

    FedEx::AddressValidationService('USD')->getServiceMethods();

    array(1) (
        0 => string(17) "addressValidation"
    )

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
    FedEx::AddressValidationService('USD')->addressValidation($request);

View last request:

    FedEx::AddressValidationService('USD')->getLastRequest();
