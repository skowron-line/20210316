<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter;

use PHPUnit\Framework\TestCase;

final class CsvFormatterTest extends TestCase
{
    public function testTransform(): void
    {
        $object = new class {
            public function toArray(): array
            {
                return [
                    'name' => 'skowron-line',
                    'id' => 12,
                ];
            }
        };

        $expected = 'skowron-line,12';
        $this->assertSame($expected, (new CsvFormatter())->transform($object));
    }
}
