<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class KidsController extends Controller
{
     // Show All Prouct
     public function index(){
        $products = Product::where([
            ['category', '=', 'kids'],
            ['is_exist', '=', 'stock in'],
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.kids.main', ['products'=>$products]);
    }

     // Show Babies
     public function babies(){
        $products = Product::where([
            ['category', '=', 'kids'],
            ['sub_category', '=', "Babies"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.kids.main', ['products'=>$products]);
    }
    
     // Show Boys
     public function boys(){
        $products = Product::where([
            ['category', '=', 'kids'],
            ['sub_category', '=', "Boys"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.kids.main', ['products'=>$products]);
    }

     // Show Girls
     public function girls(){
        $products = Product::where([
            ['category', '=', 'kids'],
            ['sub_category', '=', "Girls"],
            ['is_exist', '=', 'stock in']
        ])->orderBy('updated_at')->paginate(10);
        return view('interface.navlinks.kids.main', ['products'=>$products]);
    }
}
