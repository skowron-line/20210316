<?php

namespace Cobiro\Core\Component\Ecommerce\Application\ComandHandlers;

use Cobiro\Core\Component\Ecommerce\Application\Command\ExportTopProducts;
use Cobiro\Core\Component\Ecommerce\Application\Formatter\Formatter;
use Cobiro\Core\Component\Ecommerce\Application\Writer\Writer;
use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;
use Cobiro\Core\Component\Ecommerce\Domain\Repository\Products;
use Cobiro\Core\SharedKernel\CommandBus\CommandHandler;

final class ExportTopProductsHandler implements CommandHandler
{
    private Products $products;
    private Writer $writer;
    private Formatter $formatter;

    public function __construct(
        Products $products,
        Writer $writer,
        Formatter $formatter
    ) {
        $this->products = $products;
        $this->writer = $writer;
        $this->formatter = $formatter;
    }

    /**
     * @param object|ExportTopProducts $command
     */
    public function handle(object $command): void
    {
        // or findWithPriceGreaterThan($command->price());
        $filtered = $this->products->all()->filter(function (Product $product) use ($command) {
            return $product->price() > $command->price();
        });

        $this->writer->write($this->formatter->transform($filtered));
    }
}
