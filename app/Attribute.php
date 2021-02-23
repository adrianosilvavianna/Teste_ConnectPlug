<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name'];

    public function Products()
    {
        return $this->belongsToMany(Products::class, 'product_has_attributes', 'attribute_id', 'product_id');
    }

    public function Types()
    {
        return $this->hasMany(AttributeTypes::class);
    }

}
