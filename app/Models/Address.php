<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'city', 'district', 'state','phone', 'alternate_phone', 'user_id', 'name','pincode'
    ];
}
