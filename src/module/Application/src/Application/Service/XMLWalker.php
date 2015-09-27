<?php
namespace Application\Service;

use Application\Service\XMLHandler\XMLHandler as XMLHandler;
use Prewk\XmlStringStreamer;
use Prewk\XmlStringStreamer\Stream;
use Prewk\XmlStringStreamer\Parser;

/**
 * Class XMLWalker
 * @package Application\Service
 */
class XMLWalker
{
    const CHUNK_SIZE = 1024;

    /**
     * @param string $url
     * @param XMLHandler $handler
     * @return int
     */
    public function parse($url, XMLHandler $handler)
    {
        $stream = new Stream\Guzzle($url, self::CHUNK_SIZE);
        $parser = new Parser\StringWalker();
        $streamer = new XmlStringStreamer($parser, $stream);

        $countOfProducts = 0;

        while ($node = $streamer->getNode()) {

            $simpleXmlNode = simplexml_load_string($node);
            $handler->perform($simpleXmlNode);

            $countOfProducts++;
        }

        return $countOfProducts;
    }
}