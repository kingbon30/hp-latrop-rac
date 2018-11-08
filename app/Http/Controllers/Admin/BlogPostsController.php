<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\blog_category;
use App\Model\admin\blog_post;
use Illuminate\Support\Facades\Storage;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_posts = blog_post::orderBy('created_at','DESC')->get(); 
        return view('admin.blogs.blog-posts.show',compact('blog_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        return view('admin.blogs.blog-posts.create',compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'blog_post_title' => 'required|max:50|unique:blog_posts|min:4',
            'blog_post_slug' => 'required',
            'blog_categories' => 'required',
            'blog_post_image' => 'required',
            'blog_post_body' => 'required'
        ]);
        if ($request->hasFile('blog_post_image')){
            $imageName = $request->blog_post_image->store('public');
        }

        $blog_posts = new blog_post;
        $blog_posts->blog_post_image = $imageName;
        $blog_posts->blog_post_title = $request->blog_post_title;
        $blog_posts->blog_post_slug = $request->blog_post_slug;
        $blog_posts->blog_post_status = $request->blog_post_status;
        $blog_posts->blog_post_body = htmlspecialchars($request->blog_post_body);
        $blog_posts->save();
        $blog_posts->blog_categories()->sync($request->blog_categories);
        return redirect( route('blog-posts.index'))->with('message','Blog post save successfully');
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
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        $blog_post = blog_post::where('id',$id)->first(); 
        return view('admin.blogs.blog-posts.edit',compact('blog_categories','blog_post'));
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
        // return $request->all(); 
        $this->validate($request,[
            'blog_post_title' => 'required|max:50|min:4',
            'blog_post_slug' => 'required',
            'blog_categories' => 'required',
            // 'blog_post_image' => 'required',
            'blog_post_body' => 'required'
        ]);
        

        $blog_posts = blog_post::find($id);
        if ($request->hasFile('blog_post_image')){
            Storage::delete($blog_posts->blog_post_image);
            $imageName = $request->blog_post_image->store('public');
        }else{
            $imageName = $request->blog_post_image_dummy;
        }
        $blog_posts->blog_post_image = $imageName;
        $blog_posts->blog_post_title = $request->blog_post_title;
        $blog_posts->blog_post_slug = $request->blog_post_slug;
        $blog_posts->blog_post_status = $request->blog_post_status;
        $blog_posts->blog_post_body = htmlspecialchars($request->blog_post_body);
        $blog_posts->blog_categories()->sync($request->blog_categories);
        $blog_posts->save();
        return redirect( route('blog-posts.index'))->with('message','Blog post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        blog_post::where('id',$request->blog_post_id)->delete();
        return redirect()->back()->with('message','Blog post deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status()
    {
        return 'Hello';
    }


}
