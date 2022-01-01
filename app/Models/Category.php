<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }

    public static function boot(){

        parent::boot();

        static::deleting(function(Category $category){
            $category->subcategory()->delete();
        });
    }
}
