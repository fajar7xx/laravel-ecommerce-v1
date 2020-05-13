<?php

namespace App\Contracts;

interface ProductContract
{
    public function listProducts(
        string $order = 'id',
        string $sort = 'desc',
        array $colums = ['*']
    );

    public function findProductById(int $id);

    public function createProduct(array $params);

    public function updateProduct(array $params);

    public function deleteProduct($id);

    public function findProductBySlug($slug);
}