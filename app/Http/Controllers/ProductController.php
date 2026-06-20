<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {}

    public function index()
    {
        return ProductResource::collection(
            $this->service->getAll()
        );
    }

    public function store(ProductStoreRequest $request){
        $this->service->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Product created'
        ], 201);
    }
}