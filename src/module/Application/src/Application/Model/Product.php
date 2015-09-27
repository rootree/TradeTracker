<?php
namespace Application\Model;

class Product implements \JsonSerializable
{
    /**
     * @var string
     */
    private $productID;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var Category[]
     */
    private $categories;

    /**
     * @var string
     */
    private $productURL;

    /**
     * @var string
     */
    private $imageURL;

    /**
     * @return string
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param string $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param Category $category
     */
    public function addCategory($category)
    {
        $this->categories[] = $category;
    }

    /**
     * @return string
     */
    public function getProductURL()
    {
        return $this->productURL;
    }

    /**
     * @param string $productURL
     */
    public function setProductURL($productURL)
    {
        $this->productURL = $productURL;
    }

    /**
     * @return string
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * @param string $imageURL
     */
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;
    }

    public function jsonSerialize()
    {
        return [
            'productID' => $this->getProductID(),
            'name' => mb_strimwidth($this->getName(), 0, 100, '...'),
            'description' => mb_strimwidth($this->getDescription(), 0, 200, '...'),
            'price' => $this->getPrice(),
            'currency' => $this->getCurrency(),
            'categories' => $this->getCategories(),
            'productURL' => $this->getProductURL(),
            'imageURL' => $this->getImageURL()
        ];
    }
}