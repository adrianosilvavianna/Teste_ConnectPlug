<?php

namespace App\Http\Controllers;

use App\AttributeTypes;
use Illuminate\Http\Request;
use App\Attribute;

class AttributeTypesController extends Controller
{
    private $type;

    public function __construct(AttributeTypes $attributeTypes)
    {
        $this->type = $attributeTypes;
    }

    public function create($id)
    {
        if(!is_null(Attribute::find($id)))
        {
            return view('attribute.create_type', ['attribute_id' => $id]);
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $t = $this->type->create($request->all());
        return redirect()->back()->withInput();
    }

    public function delete($id)
    {
        $type = AttributeTypes::find($id);
        
        if(!is_null($type))
        {
            $type->attribute_id = null;
            $type->save();
            return redirect()->back();
        }
        return abort(404);
    }
}
