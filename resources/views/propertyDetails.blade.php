@extends('layouts.app')
@section('title',$property->title)
@section('styles')
    <link href="{{asset('css/detail.css')}}" rel="stylesheet">
@endsection

@section('content')

    <section id="center" class="center_detail clearfix">
        <div class="container">
            <div class="row">
                <div class="center_detail_1 clearfix">
                    <div class="col-sm-8">
                        <div class="center_detail_1l clearfix">
                            <div class="center_detail_1li clearfix">
                                <h3 class="mgt">{{$property->title}} <span
                                        class="span_1">For {{$property->status}}</span> <span class="span_2 pull-right">NPR {{$property->price}}</span>
                                </h3>
                            </div>
                            <div class="center_detail_1li1 clearfix">
                                <h4 class="mgt head_1">Gallery</h4>
                                <div id="main_area">
                                    <img src="/img/{{$property->image}}" alt="">
                                </div>
                            </div>
                            <div class="center_detail_1li1 clearfix">
                                <h4 class="mgt head_1">Description</h4><br><br>
                                {{$property->description}}
                            </div>

                            <div class="center_detail_1li1 clearfix">
                                <h4 class="mgt head_1">Other Information</h4><br><br>
                                Rooms: {{$property->rooms}}
                                <br>
                                Area: {{$property->area}} Sqft
                                <br>
                                Type: {{$property->type}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="center_detail_1r clearfix">
                            <div class="center_detail_1ri1 clearfix">
                                <h4 class="mgt"> Seller Information</h4>
                                <hr>
                                <div class="center_detail_1ri1i1 clearfix">
                                    <h5 class="bold mgt">{{$property->user->name}}</h5>
                                    <h6>Owner of Property</h6>
                                </div>
                                <h6><i class="fa fa-phone col_1"></i> <a href="tel:{{$property->user->phone}}">{{$property->user->phone}}</a></h6>
                                <h6><i class="fa fa-envelope col_1"></i> <a href="mailto:{{$property->user->email}}">{{$property->user->email}}</a></h6><br>
                            </div>
                            <div class="center_list_1r1 clearfix">
                                <h4 class="mgt">Recent Properties</h4>
                                <hr>
                                @foreach($recent_properties as $property)
                                    <div class="center_list_1r1i clearfix">
                                        <a href="{{route('property.detail',$property->id)}}"><img src="/img/{{$property->image}}" alt="abc" width="25" height="25"></a>
                                        <h5 class="bold mgt"><a href="{{route('property.detail',$property->id)}}">{{$property->title}}</a></h5>
                                        <h6>NPR {{$property->price}}</h6>
                                    </div>
                                @endforeach
                            </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="center_detail_1li1 clearfix col-md-12">
                    <h4 class="mgt head_1">Location</h4><br><br>
                    <div class="map" id="map_{{ $property->id }}" style="height: 300px; width:100%">

                    </div>
                    <input type="hidden" name="longitude" value="{{$property->longitude}}" id="longitude_{{ $property->id }}">
                    <input type="hidden" name="latitude" value="{{$property->latitude}}" id="latitude_{{ $property->id }}">


                <br>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD37VgED2IOx4im2IJf6XMbhZ0ACQnWvHw&callback=initMap" async defer></script>

<script>
    function initMap() {
        var propertyId = {{ $property->id }};
        var longitude = parseFloat(document.getElementById('longitude_' + propertyId).value);
        var latitude = parseFloat(document.getElementById('latitude_' + propertyId).value);

        var mapOptions = {
            center: { lat: latitude, lng: longitude },
            zoom: 15
        };

        var map = new google.maps.Map(document.getElementById('map_' + propertyId), mapOptions);

        var marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map: map
        });

        // Set the map center based on the marker position
        map.setCenter(marker.getPosition());
    }

    // Call the initMap function to initialize the map
    initMap();
</script>


@endsection
