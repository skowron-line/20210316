<?php

namespace Cobiro\Core\Component\Ecommerce\Application\ComandHandlers;

use Cobiro\Core\Component\Ecommerce\Application\Command\ExportProducts;
use Cobiro\Core\Component\Ecommerce\Application\Formatter\Formatter;
use Cobiro\Core\Component\Ecommerce\Application\Writer\Writer;
use Cobiro\Core\Component\Ecommerce\Domain\Repository\Products;
use Cobiro\Core\SharedKernel\CommandBus\CommandHandler;

final class ExportProductsHandler implements CommandHandler
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
     * @param object|ExportProducts $command
     */
    public function handle(object $command): void
    {
        $filtered = $this->products->all();

        $this->writer->write(
            // Maybe some template with headers
            $this->formatter->transform($filtered)
        );
    }
}
