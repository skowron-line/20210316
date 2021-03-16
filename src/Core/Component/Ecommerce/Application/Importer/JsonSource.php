<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

use Cobiro\Core\Port\JsonValidator;

final class JsonSource implements Source
{
    private Source $source;
    private JsonValidator $jsonValidator;

    public function __construct(Source $source, JsonValidator $jsonValidator)
    {
        $this->source = $source;
        $this->jsonValidator = $jsonValidator;
    }

    public function from(string $url): Source
    {
        return $this->source->from($url);
    }

    public function getData(): string
    {
        $data = $this->source->getData();

        if (!$this->jsonValidator->isValid($data)) {
            throw new \RuntimeException('Invalid source data format, expected valid json');
        }

        return $data;
    }
}
