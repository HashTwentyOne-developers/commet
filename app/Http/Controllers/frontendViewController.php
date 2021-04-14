<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class frontendViewController extends Controller
{
    public function blogView(){

        $posts= post::where('trash',false)->latest()->get();
        return view('frontend.blog',[
            'all_post' => $posts,
        ]);
    }
}
