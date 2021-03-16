<?php

namespace Cobiro\Core\Component\Ecommerce\Infrastructure\Respository;

use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;
use Cobiro\Core\Component\Ecommerce\Domain\Repository\Products;
use Cobiro\Core\Port\Persistence;
use Cobiro\Core\SharedKernel\Collection\Collection;

final class ORMProducts implements Products
{
    private Persistence $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function save(Product $product): void
    {
        $this->persistence->save($product);
    }

    public function all(): Collection
    {
        //DQL
    }
}
