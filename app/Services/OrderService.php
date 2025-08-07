<?php

namespace App\Services;

use App\DTO\OrderDto;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @throws \Throwable
     */
    public function create(OrderDto $data): Order
    {
        return DB::transaction(function () use ($data) {
            $total = 0;
            $productsData = collect($data->products)->keyBy('product_id');
            $products = Product::whereIn('id', $productsData->keys())->get();

            foreach ($products as $product) {
                $total += $product->price * $productsData[$product->id]['quantity'];
            }

            $order = Order::create([
                ...$data->orderData(),
                'total_amount' => $total,
            ]);

            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $productsData[$product->id]['quantity'],
                ]);
            }

            return $order->load('products');
        });
    }

    public function find(int $id): ?Order
    {
        return Order::with('products')->find($id);
    }
}

