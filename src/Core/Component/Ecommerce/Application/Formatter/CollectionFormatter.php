<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter;

use Cobiro\Core\SharedKernel\Collection\Collection;

final class CollectionFormatter implements Formatter
{
    private Formatter $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function transform(object $object): string
    {
        if (!$object instanceof Collection) {
            throw new \InvalidArgumentException();
        }

        $data = [];
        foreach ($object->all() as $object) {
            $data[] = $this->formatter->transform($object);
        }

        return join("\n", $data);
    }
}
