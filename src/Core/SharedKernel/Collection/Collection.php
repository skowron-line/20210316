<?php

namespace Cobiro\Core\SharedKernel\Collection;

interface Collection
{
    public function add(object $item): void;

    public function filter(callable $callback): self;

    public function all(): array;
}
