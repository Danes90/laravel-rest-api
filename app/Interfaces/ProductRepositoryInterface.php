<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function find(int $id);
    public function update(int $id, array $data);
    public function delete(int $id): void;
}
