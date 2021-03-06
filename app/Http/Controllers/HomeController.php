<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Attribute;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
/**        $product = Products::create([
            'name' => 'camisa',
            'codigo' => '123',
            'file_name' => 'tete.png'
        ]);

        $attribute = Attribute::create([
            'name' => 'Tamanho'
        ]);

        $types = $attribute->Types()->createMany([
            [
                'name' => 'P'
            ],
            [
                'name' => 'M'
            ],
            [
                'name' => 'G'
            ]
        ]);

        $productHasAttribute = $product->Attributes()->attach($attribute->id, ['attribute_type_id' => $types[0]->id]);

        dd([$product, $attribute, $types, $product->Attributes->find($attribute->id)->pivot->attribute_type_id]);
*/
        //$user = \Auth::user()->manager;
        //$locale = \App::getLocale();
        //dd($locale);
        
        return view('home');
    }

    public function changeLocale($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            session()->put('applocale', $lang);
        }

        return Redirect::back();
    
    }
}
