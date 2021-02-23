<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductHasAttributes extends Model
{
    protected $fillable = ['attribute_type_id', 'attribute_id', 'product_id'];

    public function Attribute()
    {
        return $this->belongsTo(AttributeTypes::class, "attribute_type_id","attribute_id");
    }

    public function Inventories()
    {
        return $this->belongsToMany(Inventory::class, 'inventory_prod_att', 'prod_att_id', 'invetory_id');                    
    }

}
