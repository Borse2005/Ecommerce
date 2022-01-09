<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory',
        'category_id'
    ];

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }
    
    public function product(){
        return $this->hasOne(Product::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function(Subcategory $subcategory){

            foreach ($subcategory->image as $key => $value) {
                Storage::disk('public')->delete($value->image);
            }
            
            Storage::disk('public')->delete($subcategory->product->thumbnail);
            
            $subcategory->image()->delete();
            $subcategory->product()->delete();
        });
    }
}
