<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Order;
use App\Models\ConfirmOrder;
use App\Models\User;


class ProductController extends Controller
{

    ################################ CRUD ##############################

    // Show product
    public function show(){
        $products = Product::paginate(5);
        return view('admin.navlinks.product', ['products'=>$products]);
    }

    // Show Orders
    public function order(Request $request){

        $final = array();
        $items = array();

        $orders = ConfirmOrder::all();

        foreach($orders as $order){

            $user = User::find($order->user_id);
            $product = Product::find($order->product_id);

            $items['id'] = $order->id;
            $items['name'] = $user->first_name . ' ' . $user->last_name;
            $items['category'] = $product->category;
            $items['subcategory'] = $product->sub_category;
            $items['price'] = $product->price;
            $items['quantity'] = $order->quantity;
            $items['total'] = $order->total;
            $items['country'] = $user->address->country;
            $items['city'] = $user->address->city;
            $items['address'] = $user->address->address;
            $items['phone'] = $user->address->phone;

            array_push($final, $items);
        }

        return view('admin.navlinks.order', ['orders'=>$final]);
    }

    // Delete Orders
    public function delete($id){
        ConfirmOrder::find($id)->delete();
        return redirect(route('order'));
    }

    // Show Create Form
    public function index(){
        return view('admin.product.createandupdate');
    }

    // Add New Product
    public function store(Request $request){
         
        $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'],
            'category' => ['required'],
            'subcategory' => ['required'],
            'stock' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);


        $view = 1;

        $product = Product::create([
            'name' => $request->product_name, 
            'price' => $request->price, 
            'category' => $request->category, 
            'sub_category' => $request->subcategory, 
            'is_exist' => $request->stock, 
            'view' => $view,
        ]);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->product_name . '.' . $request->image->extension();
            $request->image->move(public_path('product-images'), $newImageName);

            Image::create([
                'product_id' => $product->id,
                'name' => $newImageName,
                'path' => $newImageName,
            ]);
        }

        return redirect(route('admin'))->with('message','Product add Successfully');

    }

    // Shoe Edit Page
    public function edit($id){

        $product = Product::find($id);
        $image = Product::find($id)->image;

        return view('admin.product.createandupdate', ['product'=>$product, 'image'=>$image]);
    }

    // Update Product
    public function update(Request $request, $id){

        $product = Product::find($id);
        $image = Image::find($id);

        $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'],
            'category' => ['required'],
            'subcategory' => ['required'],
            'stock' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');

        $view = 1;

        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->sub_category = $request->subcategory;
        $product->is_exist = $request->stock;
        $product->view = $view;

        $product->save();

        
        $image->product_id = $product->id;
        $image->name = $name;
        $image->path = $path;

        $image->save();

        return redirect(route('admin'))->with('message','Product update Successfully');
    }

    // Delete Product
    public function destroy($id){
        Product::find($id)->delete();
        return redirect(route('admin'));
    }

    ######################### Add To Card Page ############################
    // Show Product in Page
    public function show_product($id){
        $product = Product::find($id);
        return view('interface.navlinks.addtocard', ['product'=>$product]);
    }

    // Add Item into Card
    public function addtocard(Request $request, $id){

        $request->validate([
            'quantity' => ['required'],
            'size' => ['required'],
        ]);

        $user = $request->user();
        
        $product = Product::find($id);

        $price = $product->price;

        $total = $price * $request->quantity;

        Order::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'total' => $total,
            'quantity' => $request->quantity,
            'items' => 1,
        ]);

        return redirect(route('home'))->with('message','Your product have added in your card Successfully');

    }
}
