<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Writer;

interface Writer
{
    public function write(string $data): void;
}
