<?php

namespace App\Services;

use App\DTO\OrderData;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @throws \Throwable
     */
    public function create(OrderData $data): Order
    {
        return DB::transaction(function () use ($data) {
            $total = 0;
            $productsData = collect($data->products)->keyBy('product_id');
            $products = Product::whereIn('id', $productsData->keys())->get();

            foreach ($products as $product) {
                $total += $product->price * $productsData[$product->id]['quantity'];
            }

            $order = Order::create([
                'customer_name' => $data->customer_name,
                'customer_email' => $data->customer_email,
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

