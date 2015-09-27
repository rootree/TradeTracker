<?php
namespace Application\Factory;

use Application\Model;

class Product implements Factory
{
    /**
     * @param \SimpleXMLElement $XMLElement
     * @return Model\Product
     */
    public function createFromXML(\SimpleXMLElement $XMLElement)
    {
        $product = new Model\Product();

        $product->setProductID((string) $XMLElement->productID);
        $product->setName((string) $XMLElement->name);
        $product->setPrice((string) $XMLElement->price);
        $product->setCurrency((string) $XMLElement->price->attributes()->currency);
        $product->setProductURL((string) $XMLElement->productURL);
        $product->setImageURL((string) $XMLElement->imageURL);
        $product->setDescription((string) $XMLElement->description);

        $categoryFactory = new Category();
        foreach($XMLElement->categories->category as $XMLCategory) {
            $category = $categoryFactory->createFromXML($XMLCategory);
            $product->addCategory($category);
        }

        return $product;
    }
}