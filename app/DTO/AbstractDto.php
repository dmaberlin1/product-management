<?php

namespace App\DTO;

use ReflectionClass;
use ReflectionNamedType;

abstract class AbstractDto
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

}
