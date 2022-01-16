<?php

namespace App\Models;

use App\Scopes\Category as ScopesCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public static function boot(){

        parent::boot();

        Static::addGlobalScope(new ScopesCategory);

        static::deleting(function(Category $category){
            if (!empty($category->image)) {
                foreach ($category->image as $key => $value) {
                    Storage::disk('public')->delete($value->image);
                }
            }
           
           foreach ($category->product as $key => $value) {
                Storage::disk('public')->delete($value->thumbnail);
           }

            $category->image()->delete();
            $category->product()->delete();
            $category->subcategory()->delete();
        });
    }
}
