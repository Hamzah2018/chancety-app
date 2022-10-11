<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    //
    public function cat()
    {
        //
        $categories = Category::where('active',1)->get();
        return view('page.product',compact( 'categories'));
    }

    public function show($id){
        $categories = Category::find($id);
        $sub_categories = $categories-> subCategories;
    //    foreach($sub_categories as $sub){
    //     echo $sub->name .'<br>';
    //    }

       return view('page.product',compact( ['sub_categories']));
        // return response($category);
    }
}
