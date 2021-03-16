<?php

namespace Cobiro\Core\SharedKernel\Collection;

use Doctrine\Common\Collections\ArrayCollection;

final class DoctrineCollectionAdapter implements Collection
{
    private ArrayCollection $collection;

    public function __construct(array $data)
    {
        $this->collection = new ArrayCollection($data);
    }

    public function add(object $item): void
    {
        $this->collection->add($item);
    }

    public function filter(callable $callback): Collection
    {
        return new self(
            $this->collection->filter($callback)->toArray()
        );
    }

    public function all(): array
    {
        return $this->collection->toArray();
    }
}
