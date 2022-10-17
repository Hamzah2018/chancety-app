<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Sub_category,Product};
use App\Http\Resources\Admin\CategoryResource;

class Category extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'description',
        'active',
    ];
    public $resource = CategoryResource::class;

    public function scopeSearch($query , $request)
    {
        if(!empty($request->search['value'])) {
            $search = '%'.$request->search['value'].'%';
            return $query->where('name', 'like' , '%'.$search.'%');
        }else {
            return $query;
        }
    }

    public  function subCategories(){
        return $this -> hasMany(Sub_category::class,'parent_id','id');
    }
    public  function product(){
        return $this -> hasMany(Product::class,'parent_id','id');
    }
}
