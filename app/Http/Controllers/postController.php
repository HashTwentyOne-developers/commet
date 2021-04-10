<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_tag;
use Illuminate\Support\Str;
use App\Models\postCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=post::where('trash',false)-> get();
        $published=post::where('trash',false)-> get() ->count();
        $trash=post::where('trash',true)-> get() ->count();
        return view('admin.post.post.index',[
            'all_data'=>$data,
            'published'=>$published,
            'trash' => $trash,
        ]);
    }

    public function postShowTrash(){
        $data=post::where('trash',true)-> get();
        $published=post::where('trash',false)-> get() ->count();
        $trash=post::where('trash',true)-> get() ->count();
        return view('admin.post.post.trash',[
            'all_data'=>$data,
            'published'=>$published,
            'trash' => $trash,
        ]);

    }

    public function trashPerform($id){

       $trash_update =  post::find($id);
       if($trash_update -> trash == 'false')
       {
        $trash_update -> trash=true;
        $trash_update ->update();
        return redirect() ->back();
       }
      else{
        $trash_update -> trash=false;
        $trash_update ->update();
        return redirect() ->back();
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_cat= postCategory::all();
        $post_tag= post_tag::all();
        return view('admin.post.post.create',[
            'post_category' => $post_cat,
            'post_tags' => $post_tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this -> validate($request,[

            'title' => 'required',
            'content' =>'required'


        ]);

        $unique_file_name='';
        if($request->hasFile('image')){
            $img = $request->file('image');
            $unique_file_name=md5(rand().time()). '.' . $img ->getClientOriginalExtension();
            $img -> move(public_path('media/post/'),$unique_file_name);
        }

        $gall_img=[];

        if($request->hasFile('gallery_img')){

            foreach($request ->file('gallery_img') as $gal_img){
                $unique_files_name=md5(rand().time()). '.' . $gal_img -> getClientOriginalExtension();
                $gal_img -> move(public_path('media/post/'),$unique_files_name);
                array_push($gall_img,$unique_files_name);
            }
        }


        $featured_img=[
            'post_type' => $request->post_type,
            'image' => $unique_file_name,
            'gallery_image' => $gall_img,
            'post_audio' =>$request->audio,
            'post_video' =>$request->video,
        ];

        post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "featured" => json_encode($featured_img),
            "description" => $request->content,
            "posted_by" => Auth::user()->id
        ]);

        return redirect()->route('post.index') ->with('success','post save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
