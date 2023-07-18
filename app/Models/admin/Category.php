<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    
/**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
  
        static::created(function ($product) {
            $product->slug = $product->createSlug($product->name);
            $product->save();
        });
    }
  
    /** 
     * https://www.itsolutionstuff.com/post/laravel-generate-unique-slug-exampleexample.html
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title){
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereName($title)->latest('id')->skip(1)->value('slug');
  
            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
  
            return "{$slug}-2";
        }
  
        return $slug;
    }

    public function products(){

        return $this->belongsToMany(Product::class, 'category_products');
    }
}
