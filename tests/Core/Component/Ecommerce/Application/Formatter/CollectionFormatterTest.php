<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Formatter;

use Cobiro\Core\SharedKernel\Collection\Collection;
use PHPUnit\Framework\TestCase;

final class CollectionFormatterTest extends TestCase
{
    public function testWhenPassedObjectIsNotCollection(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $innerFormatter = $this->getMockBuilder(Formatter::class)
            ->getMock();

        $formatter = new CollectionFormatter($innerFormatter);
        $formatter->transform(new class {});
    }

    public function testFormatter(): void
    {
        $formatter = new CollectionFormatter(new CsvFormatter());
        $actual = $formatter->transform(new class implements Collection {
            public function add(object $item): void
            {}

            public function filter(callable $callback): Collection
            {}

            public function all(): array
            {
                return [
                    new class {
                        public function toArray(): array
                        {
                            return [
                                'id' => 1,
                                'name' => 'batman',
                            ];
                        }
                    },
                    new class {
                        public function toArray(): array
                        {
                            return [
                                'id' => 2,
                                'name' => 'robin',
                            ];
                        }
                    }
                ];
            }
        });

        $expected =<<<CSV
1,batman
2,robin
CSV;

        $this->assertSame($expected, $actual);
    }
}
