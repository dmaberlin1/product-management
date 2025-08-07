<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//create и edit предназначены для веб-форм и не нужны для API.
Route::apiResource('products', ProductController::class)->except(['create', 'edit']);
Route::apiResource('orders', OrderController::class)->except(['create', 'edit']);
