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
                <a href="#" class="btn btn-sm btn-info">Add Post</a>
               </div>
               <br><br>

                <div class="card col-md-12">

                    <div class="card-header">
                        <h4 class="card-title">Post Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Category</th>
                                        <th>post image</th>
                                        <th>Post Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Doe</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                        <td>john@example.com</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_5" class="check" checked="">
                                                    <label for="status_5" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>

                                        <td>
                                            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

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
