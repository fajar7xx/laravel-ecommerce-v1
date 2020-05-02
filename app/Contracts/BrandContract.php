<?php

namespace App\Contracts;

interface BrandContract
{

    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findBrandById(int $id);

    public function createBrand(array $params);

    public function updateBrand(array $params);

    public function deleteBrand($id);
}