<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillanle = [
        'product_id',
        'thumbnail',
        'full'
    ];

    protected $casts = [
        'product_id' => 'integer'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
