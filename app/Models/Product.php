<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_id', 'product', 'thumbnail', 'description', 'price', 'discount','stock', 'color_id','specifications', 'highlight',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function () {
            Cache::forget('product');
        });

        static::updating(function () {
            Cache::forget('product');
        });

        static::deleting(function (Product $product) {
            foreach ($product->image as $key => $value) {
                Storage::delete($value->image);
            }
            $product->image()->delete();
            $product->cart()->delete();
            $product->order()->delete();
            Cache::forget('product');
        });
    }
}
