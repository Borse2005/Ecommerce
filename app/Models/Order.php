<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id', 'product_id', 'payment_status', 'delivery_status', 'user_id','qty', 'status_id'
    ];

    protected $hidden = [
        'delivery_status'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function status(){
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
