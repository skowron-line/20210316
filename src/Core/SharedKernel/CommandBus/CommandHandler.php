<?php

namespace Cobiro\Core\SharedKernel\CommandBus;

interface CommandHandler
{
    public function handle(object $command): void;
}
