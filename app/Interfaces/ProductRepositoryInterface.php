<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll();

    public function create(array $data);
}