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
                <h4 class="float-right d-inline"><a href="#add_cat" class="btn btn-info" data-toggle="modal">Add Category</a></h4>
               </div>
               <br><br>

                <div class="card col-md-12">
                    @include('validate')
                    <div class="card-header">
                        <h4 class="card-title">Category Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_data as $data)


                                    <tr>
                                        <td>{{ $loop -> index+1 }}</td>
                                        <td>{{ $data->name}}</td>
                                        <td>{{ $data->created_at ->diffForHumans() }}</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" status_id={{ $data->id }} {{ $data-> status == true ? 'checked="checked"':'' }} id="cat_status_{{$loop->index+1 }}" class="check">
                                                    <label for="cat_status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>

                                        <td>
                                            {{-- <a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i> --}}
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

<div class="modal fade" id="add_cat">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add Category</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('postcat.store') }}" method="POST"  class="form-group">
                    @csrf
                    <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br>
                    <input class="btn btn-sm btn-info float-right" type="submit">
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

@endsection
