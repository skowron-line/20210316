<?php

namespace Cobiro\Infrastructure\Writer;

use Cobiro\Core\Component\Ecommerce\Application\Writer\Writer;

final class FileWriter implements Writer
{
    private string $path;
    private string $fileName;

    public function __construct(string $path, string $fileName)
    {
        $this->path = $path;
        $this->fileName = $fileName;
    }

    public function write(string $data): void
    {
        // check if directory exists

        file_put_contents(
            sprintf('%s/%s', $this->path, $this->fileName),
            $data
        );
    }
}
