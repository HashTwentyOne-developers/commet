<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class frontendViewController extends Controller
{
    public function blogView(){

        $posts= post::where('trash',false)->latest() ->paginate(2);
        return view('frontend.blog',[
            'all_post' => $posts,
        ]);
    }
}
