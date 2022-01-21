<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color'
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public static function boot(){

        parent::boot();

        static::deleting(function (Color $color)
        {
            foreach ($color->image as $key => $value) {
                Storage::disk('public')->delete($value->image);
            }

            foreach ($color->product as $key => $value) {
                Storage::disk('public')->delete($value->thumbnail);
            }

            $color->image()->delete();
            $color->product()->delete();

        });
    }
}
