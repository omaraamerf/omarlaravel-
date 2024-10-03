<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{
    use HasFactory;

    protected $fillable=["Name","Age"];

    public function Product(){
        return $this->belongsToMany(Product::class);
    }

}
