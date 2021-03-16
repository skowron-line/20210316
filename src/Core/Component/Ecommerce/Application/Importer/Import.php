<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

use Cobiro\Core\SharedKernel\Collection\Collection;

interface Import
{
    public function import(Source $source): Collection;
}
