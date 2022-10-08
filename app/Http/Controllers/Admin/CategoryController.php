<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.category',compact( 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
            $categories = new  Category();
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->active = $request->active;
            $categories->save();
            DB::commit();
            session()->flash('Add', 'تم اضافة تصنيف بنجاح ');
            return redirect('admin/catogray');
    }

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
    }

    public function update(Request $request, $id)
    {
        //
        $id = $request->id;
        $categories = Category::find($id);
        $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
        ]);
        session()->flash('edit','تم تعديل الصنف بنجاج');
        return redirect('admin/catogray');
    }
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Category::find($id)->delete();
        session()->flash('delete','تم حذف الصنف بنجاح');
        return redirect('admin/catogray');
    }
}
