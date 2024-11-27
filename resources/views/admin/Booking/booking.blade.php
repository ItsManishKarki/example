@extends('admin.layouts.master')
@section('title','Properties')
@section('content')

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Properties List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>property Owner</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Area</th>
                        <th>Image</th>
                        <th>Paid Status</th>

                        <th>Aprove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($booking as $book)
                        <tr>
                            <th>{{$book->property->id}}</th>
                            <td>{{$book->user->name}}</td>
                            <td>{{ $book->property->user->name }}</td>
                            <td>{{ $book->contact }}</td>
                            <td>{{ $book->address }} </td>
                            <td>{{ $book->property->price }}</td>
                            <td>{{ $book->property->area }}</td>
                            <td><img src="img/{{ $book->property->image }}" width="50" height="50"></td>
                            <td>
                                @if($book->isAprove == 1)

                                <span class="badge badge-success">paid</span>
                                @else
                                <span class="badge badge-danger">unpaid</span>
                                @endif

                            </td>

                            <td>
                                @if($book->isAprove == 1)
                                <a href="{{ route('reject',$book->id) }}" class="btn btn-circle btn-danger"><i
                                    class="fa fa-trash"></i></a>
                                @else
                                <a href="{{ route('aprove',$book->id) }}" class="btn btn-circle btn-primary"><i
                                    class="fa fa-check"></i></a>

                                @endif

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

