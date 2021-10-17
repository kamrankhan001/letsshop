<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class WomenController extends Controller{

       // Show All Prouct
       public function index(){
        $products = Product::where([
            ['category', '=', 'women'],
            ['is_exist', '=', 'stock in'],
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.woman.main', ['products'=>$products]);
    }

    // Show Jeans
    public function jeans(){
        $products = Product::where([
            ['category', '=', 'women'],
            ['sub_category', '=', "Jeans"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.woman.main', ['products'=>$products]);
    }

    // Show Tees
    public function tees(){
        $products = Product::where([
            ['category', '=', 'women'],
            ['sub_category', '=', "Tees"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.woman.main', ['products'=>$products]);
    }

    // Show Beauty
    public function beauty(){
        $products = Product::where([
            ['category', '=', 'women'],
            ['sub_category', '=', "Beauty"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.woman.main', ['products'=>$products]);
    }
}
