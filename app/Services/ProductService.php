<?php

namespace App\Services;

use App\DTO\ProductDto;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function create(ProductDto $data): Product
    {
        return Product::create($data->toArray());
    }

    public function update(Product $product, ProductDto $data): Product
    {
        $product->update($data->toArray());
        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
