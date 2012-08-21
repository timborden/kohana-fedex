<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
    'wsdldirectory' => MODPATH.'fedex'.DIRECTORY_SEPARATOR.'wsdl'.DIRECTORY_SEPARATOR,
    'currency' => array(
        'USD' => array
        (
            'key' => NULL,
            'password' => NULL,

            'shipAccount' => NULL,
            'meterNumber' => NULL,
            'billAccount' => NULL,
            'dutyAccount' => NULL,

            'location' => 'https://ws.fedex.com:443',
        ),
        'CAD' => array
        (
            'key' => NULL,
            'password' => NULL,

            'shipAccount' => NULL,
            'meterNumber' => NULL,
            'billAccount' => NULL,
            'dutyAccount' => NULL,

            'location' => 'https://ws.fedex.com:443',
        ),
    ),
    'service' => array(
        'AddressValidationService' => array(
            'wsdl' => 'AddressValidationService_v2.wsdl',
            'serviceId' => 'aval',
            'major' => '2',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services',
        ),
        'CloseService' => array(
            'wsdl' => 'CloseService_v2.wsdl',
            'serviceId' => 'clos',
            'major' => '2',
            'intermediate' => '1',
            'minor' => '1',
            'location' => '/web-services/close',
        ),
        'GlobalShipAddressService' => array(
            'wsdl' => 'GlobalShipAddressService_v1.wsdl',
            'serviceId' => 'gsai',
            'major' => '1',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/globalshipaddress',
        ),
        'OpenShipService' => array(
            'wsdl' => 'OpenShipService_v3.wsdl',
            'serviceId' => 'ship',
            'major' => '3',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/openship',
        ),
        'PackageMovementInformationService' => array(
            'wsdl' => 'PackageMovementInformationService_v5.wsdl',
            'serviceId' => 'pmis',
            'major' => '5',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services',
        ),
        'PickupService' => array(
            'wsdl' => 'PickupService_v5.wsdl',
            'serviceId' => 'disp',
            'major' => '5',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services',
        ),
        'RateService' => array(
            'wsdl' => 'RateService_v13.wsdl',
            'serviceId' => 'crs',
            'major' => '13',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/rate',
        ),
        'ReturnTagService' => array(
            'wsdl' => 'ReturnTagService_v1.wsdl',
            'serviceId' => 'wsi',
            'major' => '1',
            'intermediate' => '1',
            'minor' => '1',
            'location' => '/web-services',
        ),
        'ShipService' => array(
            'wsdl' => 'ShipService_v12.wsdl',
            'serviceId' => 'ship',
            'major' => '12',
            'intermediate' => '1',
            'minor' => '0',
            'location' => '/web-services/ship',
        ),
        'TrackService' => array(
            'wsdl' => 'TrackService_v6.wsdl',
            'serviceId' => 'trck',
            'major' => '6',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/track',
        ),
        'UploadDocumentService' => array(
            'wsdl' => 'UploadDocumentService_v1.wsdl',
            'serviceId' => 'cdus',
            'major' => '1',
            'intermediate' => '2',
            'minor' => '0',
            'location' => '/web-services/uploaddocument',
        ),
    ),
);
