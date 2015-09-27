<?php
namespace Application\Service\XMLHandler;

interface XMLHandler
{
    /**
     * @param \SimpleXMLElement $XMLElement
     * @return mixed
     */
    public function perform(\SimpleXMLElement $XMLElement);
}