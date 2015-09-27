<?php
namespace Application\Factory;

interface Factory
{
    /**
     * @param \SimpleXMLElement $XMLElement
     * @return mixed
     */
    public function createFromXML(\SimpleXMLElement $XMLElement);
}