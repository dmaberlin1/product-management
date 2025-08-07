<?php

namespace App\DTO;

class OrderData
{
    public function __construct(
        public string $customer_name,
        public string $customer_email,
        public array $products
    ) {}
}
