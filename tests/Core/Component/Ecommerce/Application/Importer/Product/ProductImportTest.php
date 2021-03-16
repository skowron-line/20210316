<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer\Product;

use Cobiro\Core\Component\Ecommerce\Application\Factory\ProductFactory;
use Cobiro\Core\Component\Ecommerce\Application\Importer\JsonSource;
use Cobiro\Core\Component\Ecommerce\Application\Importer\StringSource;
use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;
use Cobiro\Core\Port\JsonValidator;
use PHPUnit\Framework\TestCase;

final class ProductImportTest extends TestCase
{
    public function testImportProducts(): void
    {
        $validator = $this->getMockBuilder(JsonValidator::class)
            ->getMock();

        $productFactory = new ProductFactory();
        $importer = new ProductImport($productFactory);

        $collection = $importer->import(
            (new JsonSource(new StringSource(), $validator))->from(__DIR__ .'/data.json')
        );

        $this->assertCount(2, $collection->all());
        $this->assertContainsOnlyInstancesOf(Product::class, $collection->all());
    }
}
