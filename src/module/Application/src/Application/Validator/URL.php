<?php
namespace Application\Validator;

class URL
{
    /**
     * @param $url
     * @return bool
     */
    public function isValidUrl($url)
    {
        $uri = new \Zend\Validator\Uri();
        if (!$uri->isValid($url)) {
            return false;
        }
        $parseUrl = parse_url($url);
        if (!isset($parseUrl['host']) || empty($parseUrl['host'])) {
            return false;
        }
        $validator = new \Zend\Validator\Hostname(\Zend\Validator\Hostname::ALLOW_DNS);
        if (!$validator->isValid($parseUrl['host'])) {
            return false;
        }
        if (!filter_var($parseUrl['host'], FILTER_VALIDATE_URL) === false) {
            return false;
        }
        list($status) = get_headers($url);
        if (strpos($status, '200') === FALSE) {
            return false;
        }
        return true;
    }
}
