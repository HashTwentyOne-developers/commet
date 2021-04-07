<?php

namespace App\Http\Controllers;

use App\Models\post_tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class postTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data= post_tag::all();
        return view('admin.post.Tag.index',[
            'all_data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            'tag_name' => 'required|unique:post_tags,name'


        ]);
        post_tag::create([
            "name" => $request->tag_name,
            "slug" => Str::slug($request->tag_name)
        ]);

        return redirect()->route('post-tag.index') ->with('success','Tag store successfully');
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
        $edit_data = post_tag::find($id);
        return[
            'id' => $edit_data->id,
            'name' => $edit_data->name,
        ];
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
        $edit_id = $request ->tag_id;

        $edit_data = post_tag::find($edit_id);
        $edit_data ->name=$request->tag_name;
        $edit_data ->slug=Str::slug($request->tag_name);
        $edit_data ->update();

        return redirect()->route('post-tag.index') ->with('success','Tag updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat_del= post_tag::find($id);
        $cat_del ->delete();
        return redirect()->back()->with('delete','Data Deleted Successfully');
    }

      /**
     * status Inactive dunction
     */
    public function statusCheckedInactive($id){

        $status_update=post_tag::find($id);
        $status_update -> status = false;
        $status_update ->update();
     }


     public function statusCheckedActive($id){

         $status_update=post_tag::find($id);
         $status_update -> status = true;
         $status_update ->update();
     }
}
