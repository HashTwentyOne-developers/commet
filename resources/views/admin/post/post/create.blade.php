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

                                <h4 class="card-title">Create  Post</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Post Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="post_format" name="post_type">
                                                <option>-- Select --</option>
                                                <option value="image">Standard post</option>
                                                <option value="gallery">Gallery post</option>
                                                <option value="video">Video post</option>
                                                <option value="audio">Audio post</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Categories</label>
                                        <div class="col-md-9">
                                            @foreach ($post_category as $p_cat )
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{ $p_cat->id }}" name="checkbox[]"> {{ $p_cat->name }}
                                                </label>
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Select Tag</label>
                                        <div class="col-md-8">
                                            <select class="form-control post_tag_select" multiple="multiple">

                                                @foreach ($post_tags as $ptag )
                                                <option>{{ $ptag->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Post Content</label>
                                        <div class="col-md-9">
                                            <textarea rows="5" cols="5" name="content"  class="form-control" id="ckeditor" placeholder="Enter text here"></textarea>
                                        </div>
                                    </div>
                                    <div class="standard_post">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3">Featured image</label>
                                            <div class="col-md-9">
                                                <label for="fimg" id="first"><img src="{{ URL::to('admin/assets/img/camera.jpg') }}" style="width:100px;cursor: pointer"/></label>
                                                <input class="form-control" type="file" name="image" id="fimg" style="display: none">
                                                <img src="" alt="" id="feather_img" style="max-width:30%;display:block">
                                                <label for="fimg" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gallery_post">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3">Gallery image</label>
                                            <div class="col-md-9">
                                                <label for="post_gallery_img" id="first"><img src="{{ URL::to('admin/assets/img/camera.jpg') }}" style="width:100px;cursor: pointer"/></label>
                                                <input class="form-control" name="gallery_img[]" type="file" id="post_gallery_img" style="display: none" multiple>

                                                <div class="gallery_image">

                                                </div>
                                                <label for="post_gallery_img" style="display: none;margin-bottom: 15px" id="second"><span class="btn btn-primary mt-2 "> Change Image</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video_post">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Video URL</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="video" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="audio_post">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Audio URL</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="audio" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
