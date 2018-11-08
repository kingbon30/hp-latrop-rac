<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public function features()
    {
    	return $this->belongsToMany('App\Model\admin\feature','vehicle_features')->withTimestamps();
    }
}
