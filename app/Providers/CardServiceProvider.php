<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;



class CardServiceProvider extends ServiceProvider
{
    protected $totalItems;

    public function register()
    {
        //
    }

    

    public function boot()
    {

        view()->composer('interface.layout.layout', function($view) {
            if (Auth::check()) {
            
                $user = Auth::User();
                $items = Order::where('user_id', '=', $user->id)->orderBy('created_at')->get();
        
                foreach ($items as $itme) {
                    $this->totalItems += 1;
                }
            }
            $view->with(['items' => $this->totalItems]);
        });
    }
}
