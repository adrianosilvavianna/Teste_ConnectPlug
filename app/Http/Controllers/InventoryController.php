<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;
use App\Inventory;
use App\Http\Requests\InventoryRequest;
use App\ProductHasAttributes;
use App\Products;


class InventoryController extends Controller
{
    private $inventory;

    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = $this->inventory->get();

        foreach()

        dd($inv->ProductHasAttributes);

        return view('inventory.index', ['inventories' => $this->inventory->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        $attributes = Attribute::all();

        return view('inventory.create', ['products' => $products, 'attributes' => $attributes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(count($request->attribute_id) == count($request->attribute_type_id))
        {
            $product = Products::find($request->product_id);

            $inventory = $this->inventory->create([
                'quantity' => $request->quantity,
                'unit_cost' => $request->unit_cost,
                'total_cost' => $request->total_cost,
    
            ]);

            for ($i = 0; $i < count($request->attribute_id); $i++) {
                
                $product_has_att = ProductHasAttributes::create(
                        [
                            'attribute_id' => $request->attribute_id[$i],
                            'attribute_type_id' => $request->attribute_type_id[$i],
                            'product_id' => $request->product_id
                        ]
                    );
                
                $product_has_att->Inventories()->attach($inventory->id);
            }
        }

        
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', ['inventory' => $inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, Inventory $inventory)
    {
        //$this->uploadFile($request);

        $inventory->update($request->all());
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventory $inventory)
    {
        //
    }
}
