<?php

namespace Cobiro\Core\Port;

interface Persistence
{
    public function save(object $object): void;
}
