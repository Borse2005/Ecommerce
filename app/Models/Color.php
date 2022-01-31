<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public static function boot(){

        parent::boot();

        static::creating(function(Color $color){
            Cache::forget('color');
        });

        static::updating(function(){
            Cache::forget('color');
        });

        static::deleting(function (Color $color)
        {
            foreach ($color->image as $key => $value) {
                Storage::disk('public')->delete($value->image);
            }

            foreach ($color->product as $key => $value) {
                foreach ($value->order as $values) {
                    $value->delete();
                }
                Storage::disk('public')->delete($value->thumbnail);
            }

            $color->image()->delete();
            $color->product()->delete();
            Cache::forget('color');
        });
    }
}
