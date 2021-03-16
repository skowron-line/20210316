<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter\Product;

use Cobiro\Core\Component\Ecommerce\Application\Formatter\Formatter;
use Cobiro\Core\Component\Ecommerce\Domain\Entity\Product;

final class ProductFormatter implements Formatter
{
    private Formatter $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function transform(object $object): string
    {
        if ($object instanceof Product) {
            throw new \InvalidArgumentException();
        }

        return $this->formatter->transform($object);
    }
}
