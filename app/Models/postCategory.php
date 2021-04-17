<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function posts(){
        return $this -> belongsToMany('App\Models\post','post_category_rel','post_id','cat_id');
    }
}
