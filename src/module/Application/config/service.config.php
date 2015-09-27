<?php
namespace Application;

use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Service as Service;

return array(
    'factories' => array(
        'Application\Service\XMLWalker' => function (ServiceLocatorInterface $sl) {
            return new Service\XMLWalker();
        },
        'Application\Service\StreamOutput' => function (ServiceLocatorInterface $sl) {
            return new Service\StreamOutput();
        },
        'Application\Service\XMLHandler\Product' => function (ServiceLocatorInterface $sl) {
            $streamOutputService = $sl->get('Application\Service\StreamOutput');
            return new Service\XMLHandler\Product(
                $streamOutputService
            );
        },
    )
);