<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id',
        'value',
        'price',
    ];

    protected $casts = [
        'attribute_id' => 'integer',
    ];
    

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}

