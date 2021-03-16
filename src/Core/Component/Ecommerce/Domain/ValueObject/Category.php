<?php

namespace Cobiro\Core\Component\Ecommerce\Domain\ValueObject;

final class Category
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function equals(string $name): bool
    {
        return $name === $this->name;
    }
}
