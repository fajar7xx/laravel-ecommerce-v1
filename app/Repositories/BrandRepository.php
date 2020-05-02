<?php

namespace App\Repositories;

use App\Brand;
use App\Traits\uploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BrandContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class BrandRepository extends BaseRepository implements BrandContract
{
    use uploadAble;

    public function __construct(Brand $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listBrands(string $order = 'id', string $sort = 'desc', array $column = ['*'])
    {
        return $this->all($column, $order, $sort);
    }

    public function findBrandById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createBrand(array $params)
    {
        try{
            $collection = collect($params);
            $logo = null;

            if($collection->has('logo') && ($params['logo'] instanceof UploadedFile)){
                $logo = $this->uploadOne($params['logo'], 'brands');
            }

            $merge = $collection->merge(compact('logo'));

            $brand = new Brand($merge->all());

            $brand->save();

            return $brand;
        }catch(QueryException $exception){
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateBrand(array $params)
    {
        $brand = $this->findBrandById($params['id']);

        $collection = collect($params)->except('_token');

        if($collection->has('logo') && ($params['logo'] instanceof UploadedFile)){
            if($brand->logo != null){
                $this->deleteOne($brand->logo);
            }

            $logo = $this->uploadOne($params['logo'], 'brands');
        }
        $merge = $collection->merge(compact('logo'));

        $brand->update($merge->all());

        return $brand;
    }

    public function deleteBrand($id)
    {
        $brand = $this->findBrandById($id);

        if($brand->logo != null){
            $this->deleteOne($brand->logo);

            $brand->delete();

            return $brand;
        }
    }
}