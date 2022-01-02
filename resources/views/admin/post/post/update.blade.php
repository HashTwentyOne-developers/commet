@extends('admin.layouts.app')

@section('main-content')

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- header -->
    @include('admin.layouts.header')
    <!-- /header -->

    <!-- Sidebar -->
    @include('admin.layouts.menu')
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                    <div class="col-md-10">
                        <div class="card flex-fill">
                            <div class="card-header">

                                <h4 class="card-title">UPdate  Post</h4>
                            </div>
                            <div class="card-body">

                                @php
                                $featured = json_decode($post ->featured);
                                @endphp

                                <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Post Type</label>
                                        <div class="col-md-9">
                                            <input type="text" readonly name="post_type" class="form-control" name="post_type" id="format_update" value="{{ $featured ->post_type }}">
                                            {{-- <select class="form-control" id="post_format" name="post_type">
                                                <option>-- Select --</option>
                                                <option value="image" selected>Standard post</option>
                                                <option value="gallery">Gallery post</option>
                                                <option value="video">Video post</option>
                                                <option value="audio">Audio post</option>

                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title" class="form-control" value="{{ $post ->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Categories</label>
                                        <div class="col-md-9">
                                            @foreach ($post_category as $p_cat )
                                            <div class="checkbox">

                                                    <input type="checkbox" value="{{ $p_cat->id }}" name="checkbox[]"
                                                        @foreach ($post->postCategories as $p)
                                                        @if ($p_cat->id == $p->id)
                                                        checked
                                                    @endif
                                                        @endforeach


                                                    > {{ $p_cat->name }}

                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Select Tag</label>
                                        <div class="col-md-8">
                                            <select class="form-control post_tag_select"  name="tag[]" multiple="multiple"
                                            @foreach ($post ->postTags  as $ptag)
                                                {{-- <option  value= {{ $ptag->id  }}> {{ $ptag->name }}</option> --}}

                                            @endforeach

                                            >



                                                @foreach ($post_tags as $ptag )
                                                <option  value= {{ $ptag->id  }}>{{ $ptag->name }}</option>
                                                @endforeach



                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Post Content</label>
                                        <div class="col-md-9">
                                            <textarea rows="5" cols="5" name="content"  class="form-control" id="ckeditor" placeholder="Enter text here">{{ $post ->description }} </textarea>
                                        </div>
                                    </div>
{{--
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Image Preview</label>
                                        <div class="col-md-9">
                                            <img src="{{ URL::to('') }}/media/post/{{ $featured->image }}" alt=" not seen"width="400px">
                                        </div>
                                    </div> --}}



                                    <div class="standard_post">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3">Update Featured image</label>
                                            <div class="col-md-9">
                                                <label for="fimg" id="first"><img src="{{ URL::to('') }}/media/post/{{ $featured->image }}" style="width:400px;cursor: pointer"/></label>
                                                <input class="form-control" type="hidden" name="old_image" value="{{ $featured->image }}"  id="" style="display: none">
                                                <input class="form-control" type="file" name="new_image"  id="fimg" style="display: none">
                                                <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                                <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="gallery_post">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3"> Update Gallery image</label>
                                            <div class="col-md-9">
                                                @foreach ($featured -> gallery_image as $gimage )
                                                <label for="post_gallery_img" id="first"><img src="{{ URL::to('') }}/media/post/{{ $gimage }}" style="width:100px;cursor: pointer"/></label>
                                                <input class="form-control" name="old_gallery_img[]" value=" {{ $gimage  }}"type="hidden" id="#" style="display: none" multiple>
                                                <input class="form-control" name="new_gallery_img[]" type="file" id="post_gallery_img" style="display: none" multiple>
                                                @endforeach
                                                <div class="gallery_image">

                                                </div>
                                                <label for="post_gallery_img" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="video_post">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Update Video URL</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="video" {{-- value=" {!! htmlspecialchars_decode($featured->post_video) !!}"  --}}value="{{ $featured->post_video }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="audio_post">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Update Audio URL</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="audio" value= "{{ $featured->post_audio }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

</div>

<!-- /Main Wrapper -->

@endsection
