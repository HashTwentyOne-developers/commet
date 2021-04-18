<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class frontendViewController extends Controller
{
    public function blogView(){

        $posts= post::where('trash',false)->latest() ->paginate(1);
        return view('frontend.blog',[
            'all_post' => $posts,
        ]);
    }

    public function blogSearch(Request $request){

        if(empty($request->search)){
            $search = "";
        }
        else{
            $search = $request ->search;
        }

      $post = post::where('title','LIKE','%'.$search.'%')->orwhere('description','LIKE','%'.$search.'%') ->latest()->paginate();

     return view('frontend.search',[
        'all_post' => $post
     ]);
    }
}
