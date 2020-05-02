<?php
namespace App\Contracts;

interface AttributeContract
{
    public function listAllAttributes(string $order = 'id', string $sort = 'desc', array $column = ['*']);

    public function findAttributeById(int $id);

    public function createAttribute(array $params);

    public function updateAttribute(array $params);

    public function deleteAttribute(int $id);
}