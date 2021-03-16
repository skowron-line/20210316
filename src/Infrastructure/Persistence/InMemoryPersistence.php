<?php

namespace Cobiro\Infrastructure\Persistence;

use Cobiro\Core\Port\Persistence;

final class InMemoryPersistence implements Persistence
{
    private array $objects;

    public function save(object $object): void
    {
        $this->objects[] = $object;
    }
}
