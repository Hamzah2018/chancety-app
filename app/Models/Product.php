<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category,Sub_category};

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

      //get main category of subcategory


      public  function Category(){
        return $this -> belongsTo(Category::class,'category_id','id');
    }
      public  function Sub_Category(){
        return $this -> belongsTo(Sub_category::class,'sub_category_id','id');
    }

}
