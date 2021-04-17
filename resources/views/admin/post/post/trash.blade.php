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
               <div class="div">
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-info">Add Post</a>
               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">Post Table</h4>
                        <a href="{{ route('post.index') }}" class="badge badge-primary">published {{($published == 0 ? '':$published)}}</a>
                        <a href="{{ route('post.trash') }}" class="badge badge-danger"> trash {{( $trash == 0 ? '': $trash) }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Post Type</th>
                                        <th>Category</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_data as $data )

                                    @php
                                        $featured_data = json_decode($data->featured);
                                    @endphp


                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $featured_data -> post_type}}</td>
                                        <td> </td>

                                        <td>
                                            {{-- <a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a> --}}
                                            <a href="{{ route('post.trashperform',$data->id) }}" class="btn btn-sm btn-warning">Recover Data</a>
                                            <form action="{{ route('post.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                            <button class=" btn btn-sm btn-danger del_button" data-toggle="tooltip" title="Delete">Permanant Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
