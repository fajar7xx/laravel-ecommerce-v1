<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
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
