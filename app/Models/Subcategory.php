<?php

namespace App\Models;

use App\Scopes\Subcategory as ScopesSubcategory;
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

        static::addGlobalScope(new ScopesSubcategory);
        
        static::deleting(function(Subcategory $subcategory){

            foreach ($subcategory->product as $key => $value) {
                foreach ($value->order as  $values) {
                    $value->delete();
                }
            }

            if (!empty($subcategory->image)) {
                foreach ($subcategory->image as $key => $value) {
                    Storage::disk('public')->delete($value->image);
                }
            }
            
            if ($subcategory->product != null) {
                Storage::disk('public')->delete($subcategory->product->thumbnail);
            }
            
            $subcategory->image()->delete();
            $subcategory->product()->delete();
        });
    }
}
