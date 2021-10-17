<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class MenController extends Controller{
    // Show All Prouct
    public function index(){
        $products = Product::where('is_exist', '=', 'stock in')->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.men.main', ['products'=>$products]);
    }

    // Show Polos
    public function polos(){
        $products = Product::where([
            ['sub_category', '=', "Men's Polos"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.men.main', ['products'=>$products]);
    }

 
    // Show Jeans
    public function jeans(){
        $products = Product::where([
            ['sub_category', '=', "Men's Jeans & Trousers"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.men.main', ['products'=>$products]);
    }

    // Show Shoe
    public function shoe(){
        $products = Product::where([
            ['sub_category', '=', "Men Shoe"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.men.main', ['products'=>$products]);
    }


}
