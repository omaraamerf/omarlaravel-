<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["NameProduct", "Price", "UserNameId"];

    public function UserName(){
        return $this->hasOne(UserName::class);
    }

}
