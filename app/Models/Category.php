<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub_category;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public  function subCategories(){
        return $this -> hasMany(Sub_category::class,'parent_id','id');
    }
}
