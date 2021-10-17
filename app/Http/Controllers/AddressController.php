<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ShippingCountry;
use App\Models\Address;
use App\Models\Order;
use App\Models\ConfirmOrder;
use Stripe;
use Session;


class AddressController extends Controller{
    
    ############################# Address #############################
    // Show Page
    public function index(Request $request){

        $grandTotal = 0;

        $user = $request->user();

        $items = Order::where('user_id', '=', $user->id)->orderBy('created_at')->get();
        $address = Address::find($user->id);

        foreach($items as $item){
            $grandTotal += $item->total;
        }

        return view("interface.navlinks.card.card", ['items'=>$items, 'address'=>$address, 'total'=>$grandTotal]);
    }


    public function delete($id){
        Order::find($id)->delete();
        return redirect(route('card'));
    }

    // Store Address
    public function address(Request $request){

        $user = $request->user();

        $request->validate([
            'country' => ['required', 'string', new ShippingCountry],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,14'],
            'gender' => ['required'],
        ]);

        $user = Address::create([
            'user_id' => $user->id,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone_number,
            'gender' => $request->gender,
        ]);

        return redirect(route('home'))->with('message','Your order confirm successfully');
    }

    // Order Confirm
    public function confirm_order(Request $request){

        $user = $request->user();

        $orders = Order::where('user_id', '=', $user->id)->get();

        if($user->address){

            foreach ($orders as $order) {
                ConfirmOrder::create([
                    'user_id' => $user->id,
                    'product_id' => $order->product_id,
                    'total' => $order->total,
                    'quantity' => $order->quantity,
                    'items' => 1,
                ]);
    
                Order::find($order->id)->delete();
            }
    
            return redirect(route('home'));
        }else{
            return redirect(route('card'))->with('message','Please tell us your address');
        }
    }

    // Payment gatway get
    public function handleGet(){
        return redirect(route('card'));
    }
  
    // Payment gatway
    public function handlePost(Request $request){

        $request->validate([
            'name' => ['required'],
            'number' => ['required'],
            'cvc' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
        ]);

        $this->confirm_order($request);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
  
        Session::flash('success', 'Payment has been successfully processed.');
          
        return redirect(route('home'));
    }

    // Add Item
    public function additem(Request $request){
        $data =  $request->quantity;

        return response()->json(['data'=>$data]);
    }
}
