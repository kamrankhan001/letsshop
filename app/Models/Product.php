<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'sub_category',
        'view',
        'is_exist',
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function confirm_order(){
        return $this->hasMany(ConfirmOrder::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
