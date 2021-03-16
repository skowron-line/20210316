<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer\Product;

use Cobiro\Core\Component\Ecommerce\Application\Factory\ProductFactory;
use Cobiro\Core\Component\Ecommerce\Application\Importer\Import;
use Cobiro\Core\Component\Ecommerce\Application\Importer\Source;
use Cobiro\Core\SharedKernel\Collection\ArrayCollection;
use Cobiro\Core\SharedKernel\Collection\Collection;

final class ProductImport implements Import
{
    private ProductFactory $productFactory;

    public function __construct(ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function import(Source $source): Collection
    {
        $productsJson = json_decode($source->getData(), true);
        $collection = new ArrayCollection();
        foreach ($productsJson['products'] as $productJson) {
            $collection->add($this->productFactory->fromArray($productJson));
        }

        return $collection;
    }
}
