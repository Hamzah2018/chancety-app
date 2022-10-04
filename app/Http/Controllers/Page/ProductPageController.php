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
        $categories = Category::all();
        return view('page.product',compact( 'categories'));
    }
}
