<?php

namespace Cobiro\Core\Component\Ecommerce\Application\ComandHandlers;

use Cobiro\Core\Component\Ecommerce\Application\Command\ImportProducts;
use Cobiro\Core\Component\Ecommerce\Application\Importer\Import;
use Cobiro\Core\Component\Ecommerce\Application\Importer\Source;
use Cobiro\Core\Component\Ecommerce\Domain\Repository\Products;
use Cobiro\Core\SharedKernel\CommandBus\CommandHandler;

final class ImportProductsHandler implements CommandHandler
{
    private Import $importer;
    private Source $source;
    private Products $products;

    public function __construct(
        Import $importer,
        Source $source,
        Products $products
    ) {
        $this->importer = $importer;
        $this->source = $source;
        $this->products = $products;
    }

    /**
     * @param object|ImportProducts $command
     */
    public function handle(object $command): void
    {
        $products = $this->importer->import(
            $this->source->from($command->sourceUrl())
        );

        foreach ($products as $product) {
            $this->products->save($product);
        }
    }
}
