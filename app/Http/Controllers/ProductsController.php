<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    private $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('products.index', ['products' => $this->products->get()]);

        //$contents = Storage::get('file.jpg');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->uploadFile($request);

        $this->products->create($request->all());
        return  $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Products $product)
    {
        //$this->uploadFile($request);

        $p = $product->update($request->all());
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    protected function uploadFile(Request $request)
    {
        //Por algum motivo meu input FILE retorna falso... :/
        if($request->hasFile('file_name')){
            
            $extension = $request->image->extension();
                $request->image->storeAs('/public', $request->file_name);
                $url = Storage::url($request->file_name);
                
                Session::flash('success', "Success!");

            return $url;
        }
        return  false;
    }
}
