<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Product;

class UserProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'user_products';
    public $timestamps = false;

}
