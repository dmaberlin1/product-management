<?php

namespace App\DTO;

class OrderDto extends AbstractDto
{
    public function __construct(
        public string $customer_name,
        public string $customer_email,
        public array $products
    ) {}

    public function orderData(): array
    {
        return [
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
        ];
    }
}
