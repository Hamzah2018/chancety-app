<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Sub_category,Product};

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $sections = Category::all();
        $products = Product::all();
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin/products.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $products = new  Product();
        $products->name = $request->name;
        $products->unity  = $request->unity;
        $products->sale_price  = $request->sale_price;
        $products->buy_price  = $request->buy_price;
        $products->sku  = $request->sku;
        $products->active = $request->active;
        $products->category_id = $request->Category;
        $products->sub_category_id = $request->sub_catogry;
        $products->save();
        DB::commit();
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products  = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin/products.edit_product', compact('categories', 'products'));
    }

    public function update(Request $request, $id)
    {
        //
        $products = Product::findOrFail($request->id);
        $products->update([
            'name' => $request->name,
            'unity' => $request->unity,
            'sale_price' => $request->sale_price,
            'buy_price' => $request->buy_price,
            'sku' => $request->sku,
            'active' => $request->active,
            'category_id' => $request->Category,
            'category_id' => $request->sub_catogry,
        ]);
        session()->flash('edit', 'تم تعديل المتج بنجاح');
        // return redirect('admin/products/edit_product');
        // return redirect('admin/product');
        return back();

    }

    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Category::find($id)->delete();
        session()->flash('delete','تم حذف المنتج بنجاح');
        return redirect('admin/product');

    }

    public function getsubcat($id){
        $sub_category = DB::table("sub-categories")->where('parent_id',$id)->pluck("name","id");
            return json_encode($sub_category);
            // dd($sub_category);
    }
}
