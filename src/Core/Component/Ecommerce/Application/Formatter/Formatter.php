<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter;

interface Formatter
{
    public function transform(object $object): string;
}
