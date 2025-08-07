<?php

namespace App\Services;

use App\DTO\ProductData;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function create(ProductData $data): Product
    {
        return Product::create((array) $data);
    }

    public function update(Product $product, ProductData $data): Product
    {
        $product->update((array) $data);
        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
