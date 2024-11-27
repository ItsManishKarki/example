@extends('admin.layouts.master')
@section('title','Edit User')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings Card Example -->
                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Category Details
                                        </div>
                                        <form action="{{route('user.update',$user->id)}}" method="POST">
                                            @csrf
                                            <div class="form-group smalls">
                                                <label>User Name <span class="text-danger">*</span> </label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="name" value="{{$user->name}}">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Email <span class="text-danger">*</span> </label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="email" value="{{$user->email}}">
                                            </div>

                                            <div class="form-group smalls">
                                                <label>Phone <span class="text-danger">*</span> </label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="phone" value="{{$user->phone}}">
                                            </div>
                                            <div class="form-group smalls">
                                                <button class="btn btn-primary theme-bg text-white" type="submit">
                                                    Update User
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Content Row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
