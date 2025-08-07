<?php

namespace App\Http\Controllers\Api;

use App\DTO\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->all());
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $dto = new ProductData(...$request->validated());
        return response()->json($this->service->create($dto), 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }

    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        $dto = new ProductData(...$request->validated());
        return response()->json($this->service->update($product, $dto));
    }

    public function destroy(Product $product): JsonResponse
    {
        $this->service->delete($product);
        return response()->json(['message' => 'Deleted']);
    }
}
