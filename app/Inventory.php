<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['total_cost', 'unit_cost', 'quantity'];


    public function ProductHasAttributes()
    {
        return $this->belongsToMany(ProductHasAttributes::class, 'inventory_prod_att', 'prod_att_id', 'invetory_id');                    
    }
}
