<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        $bytesInSimple = filesize($config['simple_path']);
        return new ViewModel(
            array(
                'memoryLimit' => ini_get('memory_limit'),
                'sizeOfSimple' => number_format($bytesInSimple / 1048576, 0) . 'M',
                'simpleURL' => $config['simple_URL']
            )
        );
    }

    public function getProductsAction()
    {
        $url = $this->params()->fromQuery('url');

        if (!(new \Application\Validator\URL())->isValidUrl($url)) {
            return $this->getResponse()->setStatusCode(400);
        }

        /** @var \Application\Service\XMLWalker $XMLWalkerService */
        $XMLWalkerService = $this->getServiceLocator()->get('Application\Service\XMLWalker');
        /** @var \Application\Service\XMLHandler\Product $XMLProductHandler */
        $XMLProductHandler = $this->getServiceLocator()->get('Application\Service\XMLHandler\Product');

        $countOfProducts = $XMLWalkerService->parse($url, $XMLProductHandler);

        $data = array(
            'countOfProducts' => $countOfProducts
        );
        return $this->getResponse()->setContent(json_encode($data));
    }
}
