<?php

namespace Cobiro\Presentation\SharedKernel\Core\Infrastructure\Symfony\Response;

use Psr\Http\Message\ResponseInterface;
use Symfony\Bridge\PsrHttpMessage\HttpMessageFactoryInterface;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class Response implements \Cobiro\Presentation\Web\Core\Port\Response
{
    public function __construct(
        private HttpMessageFactoryInterface $httpMessageFactory
    ) {
    }

    public function accepted(): ResponseInterface
    {
        return $this->httpMessageFactory->createResponse(new SymfonyResponse(null, SymfonyResponse::HTTP_ACCEPTED));
    }
}
