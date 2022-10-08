<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Support\Facades\DB;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcats = Sub_category::all();
        $categories = Category::all();
        return view('admin.sub-categories.sub-category',compact( 'subcats','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $subcats = new  Sub_category();
            $subcats->name = $request->name;
            $subcats->description = $request->description;
            $subcats->active = $request->active;
            $subcats->parent_id = $request->parent_id;
            $subcats->save();
            DB::commit();
            session()->flash('Add', 'تم اضافة تصنيف الفرعي بنجاح ');
            return redirect('admin/sub-catogray');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = $request->id;
        $categories = Sub_category::find($id);
        $categories->update([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
            'parent_id' => $request->parent_id,
        ]);
        session()->flash('edit','تم تعديل الصنف الفرعي بنجاج');
        return redirect('admin/sub-catogray');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Sub_category::find($id)->delete();
        session()->flash('delete','تم حذف الصنف الفرعي بنجاح');
        return redirect('admin/sub-catogray');
    }
}
