@extends('admin.layouts.master')
@section('title','Users')
@section('content')

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$i}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}} </td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-circle btn-primary"><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{route('user.delete',$user->id)}}" class="btn btn-circle btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        <?php $i++?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

