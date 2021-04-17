<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_tag extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function posts(){
        return $this -> belongsToMany('App\Models\post','post_tag_rel','post_id','tag_id');
    }
}
