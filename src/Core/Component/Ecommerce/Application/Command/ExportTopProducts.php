<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Command;

final class ExportTopProducts
{
    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function price(): int
    {
        return $this->price;
    }
}
