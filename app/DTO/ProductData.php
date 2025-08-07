<?php

namespace App\DTO;

class ProductData
{
    public function __construct(
        public string $name,
        public ?string $description,
        public float $price,
        public int $stock_quantity
    ) {}
}
