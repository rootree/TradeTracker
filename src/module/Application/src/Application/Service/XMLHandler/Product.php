<?php
namespace Application\Service\XMLHandler;

class Product implements XMLHandler
{
    /**
     * @var \Application\Service\StreamOutput
     */
    private $streamOutput;

    public function __construct(
        \Application\Service\StreamOutput $streamOutput
    )
    {
        $this->streamOutput = $streamOutput;
    }

    /**
     * @param \SimpleXMLElement $XMLElement
     * @return mixed
     */
    public function perform(\SimpleXMLElement $XMLElement)
    {
        $productFactory = new \Application\Factory\Product();
        $product = $productFactory->createFromXML($XMLElement);

        $this->streamOutput->flush($product);
    }
}