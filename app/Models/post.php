<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this ->belongsTo('App\Models\User');
    }

    public function postCategories(){
        return $this -> belongsToMany('App\Models\postCategory','post_category_rel','post_id','cat_id');
    }
    public function postTags(){
        return $this -> belongsToMany('App\Models\post_tag','post_tag_rel','post_id','tag_id');
    }
}
