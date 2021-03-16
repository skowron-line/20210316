<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter;

final class CsvFormatter implements Formatter
{
    public function transform(object $object): string
    {
        // check if object has method toArray
        return join(',', $object->toArray());
    }
}
