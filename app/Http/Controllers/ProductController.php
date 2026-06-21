<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductUpdateRequest;


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


    public function show(int $id)
    {
        return new ProductResource(
            $this->service->find($id)
        );
    }

    public function update(ProductUpdateRequest $request,int $id)
    {
        return new ProductResource(
            $this->service->update(
                $id,
                $request->validated()
            )
        );
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}