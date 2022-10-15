<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Sub_category,Product};

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public  function subCategories(){
        return $this -> hasMany(Sub_category::class,'parent_id','id');
    }
    public  function product(){
        return $this -> hasMany(Product::class,'parent_id','id');
    }
}
