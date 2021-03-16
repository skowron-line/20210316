<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

use Cobiro\Core\Port\JsonValidator;
use PHPUnit\Framework\TestCase;

final class JsonSourceTest extends TestCase
{
    public function testGettingSourceWhenDataIsNotValidJson(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Invalid source data format, expected valid json');

        $innerSource = new StringSource();
        $innerSource->from(__DIR__ .'/data.json');

        $validator = $this->getMockBuilder(JsonValidator::class)
            ->getMock();

        $validator
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(false);

        $jsonSource = new JsonSource($innerSource, $validator);
        $jsonSource->getData();
    }

    public function testGettingData(): void
    {
        $innerSource = new StringSource();
        $innerSource->from(__DIR__ .'/data.json');

        $validator = $this->getMockBuilder(JsonValidator::class)
            ->getMock();

        $validator
            ->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $jsonSource = new JsonSource($innerSource, $validator);
        $this->assertJson($jsonSource->getData());
    }
}
