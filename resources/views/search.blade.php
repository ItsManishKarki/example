@extends('layouts.app')
@section('title','Search Result')
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
                                <h5 class="mgt"><a href="/">Home</a> / Property</h5>
                                <h3>Property List</h3>
                            </div>
                            <br>
                            <div class="feature_2 clearfix">
                                @foreach($properties as $property)
                                    <div class="col-sm-6 space_left">
                                        <div class="feature_2im clearfix">
                                            <div class="feature_2im1 clearfix">
                                                <a href="{{route('property.detail',$property->id)}}"><img src="img/{{$property->image}}" class="iw" alt="abc"></a>
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

                                            <h5 class="bold"><a href="#">NPR {{$property->price}}</a></h5>
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

                            <div class="product_1_last text-center clearfix">
                                <div class="col-sm-12">
                                    <ul>
                                        {{$properties->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 space_left">
                        <div class="center_list_1r1 clearfix">
                            <h4 class="head_1 mgt">Recent Properties</h4>
                            @foreach($recent_properties as $property)
                                <div class="center_list_1r1i clearfix">
                                    <a href="#"><img src="img/{{$property->image}}" alt="abc" height="25" width="25"></a>
                                    <h5 class="bold mgt"><a href="#">Family Home</a></h5>
                                    <h6>NPR {{$property->price}}</h6>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
