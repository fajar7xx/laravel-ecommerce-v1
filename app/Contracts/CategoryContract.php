<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */

interface CategoryContract{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

     public function listCategories(string $order='id', string $sort = 'desc', array $column = ['*']);

     public function findCategoryById(int $id);

     public function createCategory(array $params);

     public function updateCategory(array $params);

     public function deleteCategory($id);

     public function treeList();

     public function findBySlug($slug);
}