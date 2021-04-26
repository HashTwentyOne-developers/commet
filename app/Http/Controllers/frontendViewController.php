<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\postCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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

     return view('frontend.blog-search',[
        'all_post' => $post
     ]);
    }

    public function blogCatSearch($slug){


        $cats = postCategory::where('slug', $slug) -> firstOrFail();

        return $cats -> posts;

        // return view('frontend.blog-cat-search',[
        //     'all_post' => $cat
        //  ]);


    }

    public function blogSingleView($title){

        $single_post= post::where('title',$title)->first();
        return view('frontend.blog-single',[
            'sin_post' => $single_post
        ]);
    }
}
