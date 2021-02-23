<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'codigo', 'file_name'];

    public function Attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_has_attributes', 'product_id', 'attribute_id')
                    ->withPivot('attribute_type_id', 'product_id', 'attribute_id')
                    ->using(ProductHasAttributes::class);
    }
    
    public function Inventories()
    {
        return $this->belongsTo(Inventory::class);
    }
}
