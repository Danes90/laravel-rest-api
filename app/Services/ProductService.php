<?php

namespace App\Services;
use App\Interfaces\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {
        
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}