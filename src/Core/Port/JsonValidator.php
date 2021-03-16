<?php

namespace Cobiro\Core\Port;

interface JsonValidator
{
    public function isValid(string $json): bool;
}
