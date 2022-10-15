<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,Product};


class Sub_category extends Model
{
    use HasFactory;
    protected $table = "sub-categories";
    protected $guarded = [];


    //get main category of subcategory
    public  function Category(){
        return $this -> belongsTo(Category::class,'parent_id','id');
    }
    public  function product(){
        return $this -> hasMany(Product::class);
    }
}
