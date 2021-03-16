<?php

namespace Cobiro\Core\Component\Ecommerce\Domain\Entity;

use Cobiro\Core\Component\Ecommerce\Domain\ValueObject\Category;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testToArray(): void
    {
        $product = new Product(
            $id = 1,
            $title = uniqid(),
            $price = 12,
            new Category($categoryName = uniqid())
        );

        $this->assertSame(
            [
                $id,
                $title,
                $price,
                $categoryName,
            ],
            $product->toArray()
        );
    }
}
