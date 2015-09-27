<?php
namespace Application\Service;

class StreamOutput
{
    public function flush(\JsonSerializable $object)
    {
        echo json_encode($object) . "\n";
        flush();
        ob_flush();
        usleep(333);
    }
}