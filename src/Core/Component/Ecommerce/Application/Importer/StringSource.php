<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Importer;

final class StringSource implements Source
{
    private ?string $url = null;

    public function from(string $url): Source
    {
        $this->url = $url;

        return $this;
    }

    public function getData(): string
    {
        if ($this->url === null) {
            throw new \RuntimeException('Missing source url');
        }

        return file_get_contents($this->url);
    }
}
