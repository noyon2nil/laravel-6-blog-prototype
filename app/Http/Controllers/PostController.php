<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::with('subcategory')->get();
       // return response()->json($posts);
       // echo "<pre>"; print_r($posts); exit();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
         // return response()->json($sucategories);
        return view('admin.post.add', compact('subcategories'));
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
            'sub_category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
         ]);
        $data =array();
        $data['sub_category_id']= $request->sub_category_id;
        $data['title']= $request->title;
        $data['slug']= $request->slug;
        $data['description']= $request->description;
        $image =$request->file('image');
        if($image){
            // $image_name =hexdec(uniqid());
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);
            $notification =array(
                'message'=>'Post Insert Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
