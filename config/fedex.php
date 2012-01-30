<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
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
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/close',
        ),
        'LocatorService' => array(
            'wsdl' => 'LocatorService_v2.wsdl',
            'serviceId' => 'dloc',
            'major' => '2',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services',
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
            'wsdl' => 'PickupService_v3.wsdl',
            'serviceId' => 'disp',
            'major' => '3',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services',
        ),
        'RateService' => array(
            'wsdl' => 'RateService_v10.wsdl',
            'serviceId' => 'crs',
            'major' => '10  ',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/rate',
        ),
        'ReturnTagService' => array(
            'wsdl' => 'ReturnTagService_v1.wsdl',
            'serviceId' => 'wsi',
            'major' => '1',
            'intermediate' => '1',
            'minor' => '0',
            'location' => '/web-services',
        ),
        'ShipService' => array(
            'wsdl' => 'ShipService_v10.wsdl',
            'serviceId' => 'ship',
            'major' => '10',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/ship',
        ),
        'TrackService' => array(
            'wsdl' => 'TrackService_v5.wsdl',
            'serviceId' => 'trck',
            'major' => '5',
            'intermediate' => '0',
            'minor' => '0',
            'location' => '/web-services/track',
        ),
        'UploadDocumentService' => array(
            'wsdl' => 'UploadDocumentService_v1.wsdl',
            'serviceId' => 'cdus',
            'major' => '1',
            'intermediate' => '1',
            'minor' => '0',
            'location' => '/web-services/uploaddocument',
        ),
    ),
);
