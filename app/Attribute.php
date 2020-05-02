<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    protected $fillable = [
        'code',
        'name',
        'frontend_type',
        'is_filterable',
        'is_required',
    ];

    protected $casts = [
        'is_filterable' => 'boolean',
        'is_required' => 'boolean'
    ];

    // make relationship one to many
    public function values(){
        return $this->hasMany(AttributeValue::class);
    }
}
