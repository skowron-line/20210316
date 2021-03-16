<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

use PHPUnit\Framework\TestCase;

final class StringSourceTest extends TestCase
{
    public function testGettingDataWhenUrlNotProvided(): void
    {
        $this->expectException(\RuntimeException::class);

        $source = new StringSource();
        $source->getData();
    }

    public function testGetData(): void
    {
        $source = new StringSource();
        $source->from(__DIR__ .'/data.json');
        $this->assertIsString($source->getData());
    }
}
