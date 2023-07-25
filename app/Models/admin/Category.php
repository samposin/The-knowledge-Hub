<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Category extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()
        ->dontLogIfAttributesChangedOnly(['slug', 'updated_at'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs()
        ->useLogName('categories');

    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = "This model has been {$eventName} by {$activity->causer->name} of id = {$activity->causer->id}";
    }
    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
  
        static::creating(function ($category) {
            $category->slug = $category->createSlug($category->name);
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
