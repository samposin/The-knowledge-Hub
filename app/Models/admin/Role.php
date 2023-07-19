<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
