<?php
namespace Application\Factory;

use Application\Model;

class Category implements Factory
{
    /**
     * @param \SimpleXMLElement $XMLElement
     * @return Model\Category
     */
    public function createFromXML(\SimpleXMLElement $XMLElement)
    {
        $category = new Model\Category();
        $category->setName((string) $XMLElement);
        return $category;
    }
}