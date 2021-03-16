<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Factory;

use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;
use Cobiro\Core\Component\Ecommerce\Domain\ValueObject\Category;

final class ProductFactory
{
    public function fromArray(array $data): Product
    {
        // For example Option Resolver to validate if array contain required keys

        return new Product(
            $data['id'],
            $data['title'],
            (int) $data['price'],
            new Category($data['category'])
        );
    }
}
