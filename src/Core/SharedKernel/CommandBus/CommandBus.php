<?php

namespace Cobiro\Core\SharedKernel\CommandBus;

interface CommandBus
{
    public function register(string $command, object $handler): void;

    public function handle(object $command): void;
}
