<?php

namespace Cobiro\Presentation\Web\Core\Component\Ecommerce\Importer;

use Cobiro\Core\Component\Ecommerce\Application\Command\ExportProducts;
use Cobiro\Core\Component\Ecommerce\Application\Command\ExportTopProducts;
use Cobiro\Core\Component\Ecommerce\Application\Command\ImportProducts;
use Cobiro\Core\SharedKernel\CommandBus\CommandBus;
use Cobiro\Presentation\Web\Core\Port\Response;
use Nyholm\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class ImportExportTest extends TestCase
{
    public function testAcceptRequest(): void
    {
        $commandBus = $this->getMockBuilder(CommandBus::class)
            ->getMock();

        $commandBus
            ->expects($this->exactly(3))
            ->method('handle')
            ->withConsecutive(
                [
                    $this->isInstanceOf(ImportProducts::class),
                    $this->isInstanceOf(ExportTopProducts::class),
                    $this->isInstanceOf(ExportProducts::class)
                ]
            );

        $request = new ServerRequest('post', 'localhost');
        $request->withAttribute('products', 'localhost');

        $response = $this->getMockBuilder(Response::class)
            ->getMock();

        $response
            ->expects($this->once())
            ->method('accepted')
            ->willReturn($this->isInstanceOf(ResponseInterface::class));

        $controller = new ImportExport(
            $response,
            $commandBus
        );

        $controller->__invoke($request);
    }
}
