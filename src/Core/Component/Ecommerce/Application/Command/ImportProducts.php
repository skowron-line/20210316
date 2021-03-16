<?php

namespace Cobiro\Core\Component\Ecommerce\Application\Command;

final class ImportProducts
{
    private string $sourceUrl;

    public function __construct(string $sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;
    }

    public function sourceUrl(): string
    {
        return $this->sourceUrl;
    }

}
