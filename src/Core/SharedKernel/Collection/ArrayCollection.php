<?php

namespace Cobiro\Core\SharedKernel\Collection;

final class ArrayCollection implements Collection
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function add(object $item): void
    {
        $this->data[] = $item;
    }

    public function filter(callable $callback): Collection
    {
        $filtered = array_filter($this->data, $callback);

        return new self($filtered);
    }

    public function all(): array
    {
        return $this->data;
    }
}
