<?php

namespace App\Http\Controllers\Api;

use App\DTO\OrderDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(protected OrderService $service) {}

    public function store(OrderRequest $request): JsonResponse
    {
        $dto = new OrderDto(...$request->validated());
        return response()->json($this->service->create($dto), 201);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->service->find($id);
        return $order
            ? response()->json($order)
            : response()->json(['message' => 'Order not found'], 404);
    }
}
