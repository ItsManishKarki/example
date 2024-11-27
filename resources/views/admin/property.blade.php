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
                        <th>SN</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Rooms</th>
                        <th>Price</th>
                        <th>Area</th>
                        <th>Image</th>
                        <th>Uploaded By</th>
                        <th>Uploaded At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($properties as $property)
                        <tr>
                            <th>{{$i}}</th>
                            <td>{{$property->title}}</td>
                            <td>{{$property->description}}</td>
                            <td>{{$property->status}} </td>
                            <td>{{$property->type}} </td>
                            <td>{{$property->rooms}} </td>
                            <td>{{$property->price}} </td>
                            <td>{{$property->area}} Sqft</td>
                            <td><img src="/img/{{$property->image}}" width="50" height="50"></td>
                            <td>{{$property->user->name}} </td>

                            <td>{{$property->created_at->diffForHumans()}}</td>

                        </tr>
                        <?php $i++?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

