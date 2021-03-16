<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

interface Source
{
    public function from(string $url): self;

    public function getData(): string;
}
