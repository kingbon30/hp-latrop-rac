<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
  public function vehicles()
    {
        return $this->belongsToMany('App\Model\admin\vehicle','vehicle_features')->orderBY('created_at','DESC')->paginate(10);
    }
}
