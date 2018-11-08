<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class blog_category extends Model
{
    public function blog_posts()
    {
    	return $this->belongsToMany('App\Model\admin\blog_post','blog_post_categories')->orderBY('created_at','DESC')->paginate(10);
    }
    public function getRouteKeyName()
	{
	   	return 'blog_category_slug';
	}
	
}
