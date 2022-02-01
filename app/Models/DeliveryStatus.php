<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    protected $hidden  = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }
}
