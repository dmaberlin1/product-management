<?php

namespace App\DTO;

class ProductDto extends AbstractDto
{
    public function __construct(
        public string $name,
        public ?string $description,
        public float $price,
        public int $stock_quantity
    ) {}
}
