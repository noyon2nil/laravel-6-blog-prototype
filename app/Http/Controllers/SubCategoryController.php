<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        // return Response()->json($subCategories);
        // echo "<pre>"; print_r($subCategories); exit();
        return view('admin.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // return response()->json($categories);
        return view('admin.sub-category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $subcategory = new SubCategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->save();
        $notification =array(
                'message'=>'Category add success',
                'alert-type'=>'success'
            );
         return redirect()->route('sub.category')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategory = SubCategory::find($id);
        return view('admin.sub-category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categories = Category::all();
         $subCategoriy =SubCategory::find($id);
        return view('admin.sub-category.edit', compact('categories', 'subCategoriy'));
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
        $subcategory = SubCategory::findorfail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->save();
        $notification =array(
                'message'=>'Sub Category Update success',
                'alert-type'=>'success'
            );
         return redirect()->route('sub.category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findorfail($id);
        $subcategory->delete();
        $notification =array(
                'message'=>'Delete sub Category success',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);

    }
}
