<?php

namespace Cobiro\Presentation\Web\Core\Component\Ecommerce\Importer;

use Cobiro\Core\Component\Ecommerce\Application\Command\ExportProducts;
use Cobiro\Core\Component\Ecommerce\Application\Command\ExportTopProducts;
use Cobiro\Core\Component\Ecommerce\Application\Command\ImportProducts;
use Cobiro\Core\SharedKernel\CommandBus\CommandBus;
use Cobiro\Presentation\Web\Core\Port\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ImportExport
{
    private Response $response;
    private CommandBus $commandBus;

    public function __construct(Response $response, CommandBus $commandBus)
    {
        $this->response = $response;
        $this->commandBus = $commandBus;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $this->commandBus->handle(
            new ImportProducts($request->getAttribute('products'))
        );

        // Update Products categories based on on old category

        $this->commandBus->handle(
            new ExportTopProducts(100) //100 should be from parameter
        );

        $this->commandBus->handle(
            new ExportProducts()
        );

        return $this->response->accepted();
    }
}
