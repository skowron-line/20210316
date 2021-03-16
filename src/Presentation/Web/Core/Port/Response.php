<?php

namespace Cobiro\Presentation\Web\Core\Port;

use Psr\Http\Message\ResponseInterface;

interface Response
{
    public function accepted(): ResponseInterface;
}
