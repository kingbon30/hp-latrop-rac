<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\blog_category;
use App\Model\admin\blog_post;

class PagesController extends Controller
{
    public function index()
    {

        $latest_posts = blog_post::where('blog_post_status',1)->orderBy('updated_at','DESC')->paginate(3); 
        return view('user.index',compact('latest_posts'));
    }
    public function about()
    {
    	return view('user.about');
    }
    public function blogpost(blog_post $blog_post_slug)
    {
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        $latest_posts = blog_post::where('blog_post_status',1)->orderBy('updated_at','DESC')->paginate(5); 
    	return view('user.blog-post',compact('blog_post_slug','blog_categories','latest_posts'));
    }
    public function blog()
    {
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        $blog_posts = blog_post::where('blog_post_status',1)->orderBy('created_at','DESC')->paginate(10); 
        $latest_posts = blog_post::where('blog_post_status',1)->orderBy('updated_at','DESC')->paginate(5); 
    	return view('user.blog',compact('blog_posts','blog_categories','latest_posts'));
    }
    public function carparts()
    {
    	return view('user.car-parts');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function faq()
    {
    	return view('user.faq');
    }
    public function vehicle()
    {
    	return view('user.vehicle');
    }
    public function vehicles()
    {
    	return view('user.vehicles');
    }
    public function blogcategory(blog_category $blog_category)
    {
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        $blog_posts = $blog_category->blog_posts();
        $latest_posts = blog_post::where('blog_post_status',1)->orderBy('updated_at','DESC')->paginate(5); 
        return view('user.blog',compact('blog_posts','blog_categories','latest_posts')); 
    }

    public function search(request $request)
    {
        $search = $request->get('search');
        $blog_categories = blog_category::orderBy('blog_category_name','ASC')->get(); 
        $blog_posts = blog_post::where('blog_post_title', 'like', '%'.$search. '%')
                    ->orWhere ( 'blog_post_body', 'LIKE', '%' . $search . '%' )
                    ->paginate(10);
        $latest_posts = blog_post::where('blog_post_status',1)->orderBy('updated_at','DESC')->paginate(5); 
        return view('user.blog',compact('blog_posts','blog_categories','latest_posts'));

    }
}
