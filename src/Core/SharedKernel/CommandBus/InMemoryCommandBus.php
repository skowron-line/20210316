<?php

namespace Cobiro\Core\SharedKernel\CommandBus;

final class InMemoryCommandBus implements CommandBus
{
    private array $handlers;

    public function register(string $command, object $handler): void
    {
        if (isset($this->handlers[$command])) {
            throw new \RuntimeException(sprintf('Command "%s" is already registered', $command));
        }

        $this->handlers[$command] = $handler;

    }

    public function handle(object $command): void
    {
        if (!isset($this->handlers[get_class($command)])) {
            return;
        }

        $this->handlers[get_class($command)]->handle($command);
    }
}
