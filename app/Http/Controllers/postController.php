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
            'post_video' => str_replace('watch?v=','embed/',$request->video)
        ];

        $posts = post::create([
            "user_id" =>Auth::user()->id,
            "title" => $request->title,
            "slug" => $this->getslug($request->title),
            "featured" => json_encode($featured_img),
            "description" => $request->content,
            "posted_by" => Auth::user()->id
        ]);

        $posts->postCategories()->attach($request->checkbox);
        $posts->postTags()->attach($request->tag);

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
    {   $p= post::find($id);
        $post_cat= postCategory::all();
        $post_tag= post_tag::all();
        return view('admin.post.post.update',[
            'post' => $p,
            'post_category' => $post_cat,
            'post_tags' => $post_tag,
        ]);



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
        $edit_id = $id;
        $edit_data=post::find($edit_id);
        $edit_data -> title = $request->title;
        $edit_data -> slug=Str::slug($request->title);
        $edit_data -> description= $request ->content;

        $edit_data->postCategories()->sync($request->checkbox);
        $edit_data->postTags()->sync($request->tag);

        $unique_file_name='';
        if($request->hasFile('new_image')){
            $img = $request->file('new_image');
            $unique_file_name=md5(rand().time()). '.' . $img ->getClientOriginalExtension();
            $img -> move(public_path('media/post/'),$unique_file_name);
            // unlink('media/post/'.$request-> old_image);
        }

        else{

            $unique_file_name= $request ->old_image;

        }

        $gall_img=[];


        if($request->hasFile('new_gallery_img'))
            {
                foreach($request ->file('new_gallery_img') as $gal_img){
                    $unique_files_name=md5(rand().time()). '.' . $gal_img -> getClientOriginalExtension();
                    $gal_img -> move(public_path('media/post/'),$unique_files_name);
                    array_push($gall_img,$unique_files_name);
                    //
                }

                foreach($request-> old_gallery_img as $ims){
                    unlink('media/post/'. $ims);
                }
            }

          else if($request->old_gallery_img != ''){
            $gall_img= $request-> old_gallery_img;
            }

            else{
                $gall_img= [];
            }









        $featured_img=[
            'post_type' => $request->post_type,
            'image' => $unique_file_name,
            'gallery_image' => $gall_img,
            'post_audio' =>$request->audio,
            'post_video' => str_replace('watch?v=','embed/',$request->video)
        ];

        $edit_data-> featured = json_encode($featured_img);



        $edit_data ->update();

        return redirect()->route('post.index') ->with('success','data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = post::find($id);
        $posts ->delete();
        return redirect()->back()->with('delete','Data Deleted Successfully');
    }
}
