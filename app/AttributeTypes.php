<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeTypes extends Model
{
    protected $fillable = ['name', 'attribute_id'];

    public function Attributes()
    {
        return $this->belongsTo(Attributes::class);
    }
}
