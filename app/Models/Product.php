<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'product',
        'thumbnail',
        'description',
        'brand',
        'price',
        'discount',
        'stock',
        'color',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function(Product $product){
            foreach ($product->image as $key => $value) {
                Storage::delete($value->image);
            }
            $product->image()->delete();
        });
    }
}
