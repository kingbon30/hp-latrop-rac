<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class blog_post extends Model
{
    public function blog_categories()
    {
    	return $this->belongsToMany('App\Model\admin\blog_category','blog_post_categories')->withTimestamps();
    }

   public function getRouteKeyName()
   {
   	 return 'blog_post_slug';
   }
}
