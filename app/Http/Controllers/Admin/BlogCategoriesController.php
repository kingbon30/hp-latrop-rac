<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\blog_category;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_categories = blog_category::orderBy('created_at','DESC')->get(); 
        return view('admin.blogs.blog-categories.show',compact('blog_categories'));
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
        $this->validate($request,[
            'blog_category_name' => 'required|max:50|unique:blog_categories|min:4',
            'blog_category_slug' => 'required'
        ]);
        $blog_categories = new blog_category;
        $blog_categories->blog_category_name = $request->blog_category_name;
        $blog_categories->blog_category_slug = $request->blog_category_slug;
        $blog_categories->save();
        return redirect()->back()->with('message','Category save successfully');
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
    public function update(Request $request)
    {
        $this->validate($request,[
            'blog_category_name' => 'required|max:50|unique:blog_categories|min:4',
            'blog_category_slug' => 'required'
        ]);
        $blog_categories = blog_category::find($request->blog_category_id);
        $blog_categories->blog_category_name = $request->blog_category_name;
        $blog_categories->blog_category_slug = $request->blog_category_slug;
        $blog_categories->save();
        return redirect()->back()->with('message','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        blog_category::where('id',$request->blog_category_id)->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }
}
