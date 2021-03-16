<?php

namespace Cobiro\Core\Component\Ecommerce\Domain\Repository;

use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;
use Cobiro\Core\SharedKernel\Collection\Collection;

interface Products
{
    public function save(Product $product): void;

    public function all(): Collection;
}
