<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\postCategory;
use Illuminate\Support\Str;

class postCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = postCategory::all();
        return view('admin.post.Category.index',[
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

            'cat_name' => 'required|unique:post_categories,name'


        ]);
        postCategory::create([
            "name" => $request->cat_name,
            "slug" => Str::slug($request->cat_name)
        ]);

        return redirect()->route('postcat.index') ->with('success','data send successfully');
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

    /**
     * status Inactive dunction
     */
    public function statusCheckedInactive($id){

       $status_update=postCategory::find($id);
       $status_update -> status = false;
       $status_update ->update();
    }

    public function statusCheckedActive($id){

        $status_update=postCategory::find($id);
        $status_update -> status = true;
        $status_update ->update();
    }
}
