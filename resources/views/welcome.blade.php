@extends('layouts.app')
@section('title','Home')
@section('content')
    <section id="center" class="center_home clearfix">
        <div class="center_main clearfix">
            <div class="w3-content w3-section clearfix">
                @if(count($sliders)==0)
                    <img class="mySlides w3-animate-top" src="{{asset('/img/desktop-wallpaper-buildings-manipulated-nature-in-jpg-real-estate.jpg')}}" alt="abc"
                         style="width: 100%; display: none;">
                @else
                    @foreach($sliders as $slider)
                        <img class="mySlides w3-animate-top" src="img/{{$slider->image}}" alt="abc"
                             style="width: 100%; display: none;">
                    @endforeach
                @endif
            </div>
            <div class="center_main_1 clearfix">
                <div class="col-sm-8"></div>
                <div class="col-sm-4">
                    <div class="center_main_1r clearfix">
                        <h5 class="mgt col">Property Status</h5>

                        <form action="{{route('search')}}" method="POST">
                            @csrf
                            <select class="form-control" name="status" required>
                                <option selected disabled>Any Status</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                            <button class="button_1 block">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="feature_1 clearfix">
                    <div class="col-sm-12">
                        <h4 class="mgt">RECENTLY <br><span class="col_1">PROPERTIES</span></h4>
                    </div>
                </div>
                <div class="feature_2 clearfix">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                @if(count($recent_properties)==0)
                                    <div class="col-sm-4">
                                        <div class="feature_2im clearfix">
                                            <div class="feature_2im1 clearfix">
                                                <a href="#"><img src="" class="iw" alt="abc"></a>
                                            </div>
                                            <div class="feature_2im2 clearfix">
                                                <h6 class="pull-right mgt"><a class="bg_2" href="#">For Rent</a></h6>
                                            </div>
                                            <div class="feature_2im4 clearfix">
                                                <div class="col-sm-6 space_left">
                                                    <h6><a class="bg_3" href="#">Family Home</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feature_2m_last clearfix">
                                            <h4 class="mgt bold"><a href="#">Lorem House Luxury Villa</a></h4>

                                            <h5 class="bold"><a href="#">$ 130,000</a></h5>
                                            <div class="feature_2m_last_i clearfix">
                                                <h6><a href="#"><i class="fa fa-user"></i> Eget Nulla <span
                                                            class="pull-right"><i
                                                                class="fa fa-calendar"></i> 3 months ago</span></a></h6>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($recent_properties as $property)
                                        <div class="col-sm-4">
                                            <div class="feature_2im clearfix">
                                                <div class="feature_2im1 clearfix">
                                                    <a href="{{route('property.detail',$property->id)}}"><img src="img/{{$property->image}}" class="iw"
                                                                     alt="abc"></a>
                                                </div>
                                                <div class="feature_2im2 clearfix">
                                                    <h6 class="pull-right mgt"><a class="bg_2"
                                                                                  href="">{{$property->status}}</a>
                                                    </h6>
                                                </div>
                                                <div class="feature_2im4 clearfix">
                                                    <div class="col-sm-6 space_left">
                                                        <h6><a class="bg_3" href="#">{{$property->type}}</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feature_2m_last clearfix">
                                                <h4 class="mgt bold"><a href="{{route('property.detail',$property->id)}}">{{$property->title}}</a></h4>

                                                <h5 class="bold"><a href="#">NPR {{$property->price}}</a></h5>
                                                {{-- <div class="feature_2m_last_i clearfix">
                                                    <h6><a href="#"><i class="fa fa-user"></i> {{$property->user->name}}
                                                            <span
                                                                class="pull-right"><i
                                                                    class="fa fa-calendar"></i> {{$property->created_at->diffForHumans()}}</span></a>
                                                    </h6>
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="serv_home">
        <div class="serv_home_m clearfix">
            <div class="container">
                <div class="row">
                    <div class="feature_1 clearfix">
                        <div class="col-sm-12">
                            <h4 class="mgt">PROPERTY <br><span class="col_1">SERVICES</span></h4>
                        </div>
                    </div>
                    <div class="serv_home_1 clearfix">
                        <div class="col-sm-4">
                            <div class="serv_home_1i clearfix">
                                <div class="serv_home_1i1 clearfix">
                                    <h4 class="mgt col">Houses</h4>
                                    <p class="col">Beauitful Houses.</p>
                                </div>
                                <div class="serv_home_1i2 clearfix">
                                    <span><i class="fa fa-home"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serv_home_1i clearfix">
                                <div class="serv_home_1i1 clearfix">
                                    <h4 class="mgt col">Apartments</h4>
                                    <p class="col">Very Nice Apartments.</p>
                                </div>
                                <div class="serv_home_1i2 clearfix">
                                    <span><i class="fa fa-building-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serv_home_1i clearfix">
                                <div class="serv_home_1i1 clearfix">
                                    <h4 class="mgt col">Commercial</h4>
                                    <p class="col">Commercial Buildings.</p>
                                </div>
                                <div class="serv_home_1i2 clearfix">
                                    <span><i class="fa fa-gear"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about_home">
        <div class="container">
            <div class="row">
                <div class="about_home_1 clearfix">
                    <div class="col-sm-3">
                        <div class="about_home_1i clearfix">
                            <span class="span_1"><i class="fa fa-home col_1"></i></span>
                            <h3 class="mgt">350 <br><span class="span_2">Sold Houses</span></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="about_home_1i clearfix">
                            <span class="span_1"><i class="fa fa-list col_1"></i></span>
                            <h3 class="mgt">450 <br><span class="span_2">Daily Listings</span></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="about_home_1i clearfix">
                            <span class="span_1"><i class="fa fa-users col_1"></i></span>
                            <h3 class="mgt">250 <br><span class="span_2">Expert Agents</span></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="about_home_1i clearfix">
                            <span class="span_1"><i class="fa fa-trophy col_1"></i></span>
                            <h3 class="mgt">150 <br><span class="span_2">Won Awards</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
