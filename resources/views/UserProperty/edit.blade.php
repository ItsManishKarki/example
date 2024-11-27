@extends('layouts.app')
@section('title','Add Property')
@section('styles')
    <link href="{{asset('css/submit.css')}}" rel="stylesheet">
@endsection
@section('content')
    <section id="center" class="center_blog clearfix">
        <div class="container">
            <div class="row">
                <div class="center_blog_1 text-center clearfix">
                    <div class="col-sm-12">
                        <h2 class="mgt">EDIT PROPERTY</h2>
                        <h5><a href="/">Home</a> / Submit Property</h5>
                    </div>
                </div>
                <form action="{{route('update.myproperty',$property->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="submit_1 clearfix">
                        @csrf
                        <h4 class="mgt col_1">Property Description And Price</h4>
                        <hr>
                        <h5>Property Title</h5>
                        <input class="form-control" placeholder="Property Title" value="{{ $property->title }}" type="text" name="title" required>
                        <h5>Property Description</h5>
                        <textarea placeholder="Property Description" class="form-control form_o" name="description" required>{{ $property->description }}</textarea>
                        <div class="submit_1i clearfix">
                            <div class="col-sm-4 space_left">
                                <div class="submit_1i1 clearfix">
                                    <h5>Status</h5>
                                    <select class="form-control" name="status" required>
                                        <option disabled selected>Select Status</option>
                                        <option value="Rent"
                                        @if($property->status === 'Rent')
                                        selected
                                        @endif

                                        >Rent</option>
                                        <option value="Sale"
                                            @if ($property->status === 'Sale')
                                            selected

                                            @endif
                                        >Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 space_all">
                                <div class="submit_1i1 clearfix">
                                    <h5>Type</h5>
                                    <select class="form-control" name="type" required>
                                        <option disabled selected>Select Type</option>
                                        <option value="House"
                                        @if ($property->type === 'House')
                                            selected

                                            @endif
                                        >House</option>
                                        <option value="Commercial"
                                        @if ($property->type === 'Commercial')
                                        selected

                                        @endif
                                        >Commercial</option>
                                        <option value="Apartment"
                                        @if ($property->type === 'Apartment')
                                        selected

                                        @endif
                                        >Apartment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 space_right">
                                <div class="submit_1i1 clearfix">
                                    <h5>Rooms</h5>
                                    <select class="form-control" name="rooms" required>
                                        <option selected disabled>Select Type</option>
                                        <option value="1"
                                        @if ($property->rooms == 1)
                                        selected

                                        @endif
                                        >1</option>
                                        <option value="2"
                                        @if ($property->rooms == 2)
                                        selected

                                        @endif
                                        >2</option>
                                        <option value="3"
                                        @if ($property->rooms == 3)
                                        selected

                                        @endif
                                        >3</option>
                                        <option value="4"
                                        @if ($property->rooms == 4)
                                        selected

                                        @endif
                                        >4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit_1i clearfix">
                            <div class="col-sm-6 space_left">
                                <div class="submit_1i1 clearfix">
                                    <h5>Price</h5>
                                    <input class="form-control" placeholder="NPR" type="number" value="{{ $property->price }}" name="price" required>
                                </div>
                            </div>
                            <div class="col-sm-6 space_right">
                                <div class="submit_1i1 clearfix">
                                    <h5>Area</h5>
                                    <input class="form-control" placeholder="Sqft" value="{{ $property->area }}" type="number" name="area" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit_1 clearfix">
                        <h4 class="mgt col_1">Property Media</h4>
                        <hr>
                        <div class="submit_1ii clearfix">
                            <span class="span_1"><i class="fa fa-cloud-upload"></i></span>
                            <input type="file" value="{{ $property->image }}" required name="image">
                        </div>
                    </div>
                    <div class="submit_1 clearfix">
                        <h4 class="mgt col_1">Location</h4>
                        <hr>
                        <div id="map" style="height: 300px; width:100%">

                        </div>
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="latitude" id="latitude">


                    </div>

                    <div class="submit_3 clearfix">
                        <button class="button mgt" type="submit">Update Property</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD37VgED2IOx4im2IJf6XMbhZ0ACQnWvHw&callback=initMap" async defer></script>

    <script>
        var marker;
        function initMap() {

            var mapOptions = {
                center: { lat: 26.667138161600498, lng: 87.26931552704445 },
                zoom: 15
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Add a click event listener to save pin location
            map.addListener('click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                if (marker) {
                marker.setMap(null);
            }
            marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: map
            });
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

                // Send an AJAX request to save the pin location

            });
        }



        // Call the initMap function to initialize the map
        initMap();
    </script>
    @endsection

@endsection
