@extends('layouts.app')
@section('title','My properties')

@section('styles')
    <link href="{{asset('css/listing.css')}}" rel="stylesheet">
@endsection
@section('content')
    <section id="center" class="center_list clearfix">
        <div class="container">
            <div class="row">
                <div class="center_list_1 clearfix">
                    <div class="col-sm-9">
                        <div class="center_list_1l clearfix">
                            <div class="center_list_1li clearfix">
                                <h5 class="mgt"><a href="/">Home</a> / My Booking</h5>
                                <h3>My Booking List</h3>
                            </div>
                            <br>
                            <div class="feature_2 clearfix">
                                @foreach($booking as $property)
                                    <div class="col-sm-6 space_left" style="padding: 4px;">
                                        <div class="feature_2im clearfix">
                                            <div class="feature_2im1 clearfix">
                                                <a href="{{route('property.detail',$property->id)}}"><img src="img/{{$property->property->image}}" class="iw" alt="abc"></a>
                                            </div>
                                            <div class="feature_2im2 clearfix">
                                                <h6 class="pull-right mgt"><a class="bg_4" href="#">{{$property->status}}</a>
                                                </h6>
                                            </div>
                                            <div class="feature_2im4 clearfix">
                                                <div class="col-sm-6 space_left">
                                                    <h6><a class="bg_3" href="#">{{$property->type}}</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feature_2m_last clearfix">
                                            <h4 class="mgt bold"><a href="#">{{$property->title}}</a></h4>
                                            <div class="div" style="display:flex; justify-content: space-between">
                                                <h5 class="bold"><a href="#">NPR {{$property->property->price}}</a></h5>
                                            </div>
                                            <div class="feature_2m_last_i clearfix">
                                                <h6><a href="#"><i class="fa fa-user"></i> {{$property->user->name}} <span
                                                            class="pull-right"><i
                                                                class="fa fa-calendar"></i> {{$property->created_at->diffForHumans()}}</span></a>
                                                </h6>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection


