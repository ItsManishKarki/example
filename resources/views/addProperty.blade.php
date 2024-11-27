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
                        <h2 class="mgt">SUBMIT PROPERTY</h2>
                        <h5><a href="/">Home</a> / Submit Property</h5>
                    </div>
                </div>
                <form action="{{route('property.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="submit_1 clearfix">
                        @csrf
                        <h4 class="mgt col_1">Property Description And Price</h4>
                        <hr>
                        <h5>Property Title</h5>
                        <input class="form-control" placeholder="Property Title" type="text" name="title" required>
                        <h5>Property Description</h5>
                        <textarea placeholder="Property Description" class="form-control form_o" name="description" required></textarea>
                        <div class="submit_1i clearfix">
                            <div class="col-sm-4 space_left">
                                <div class="submit_1i1 clearfix">
                                    <h5>Status</h5>
                                    <select class="form-control" name="status" required>
                                        <option disabled selected>Select Status</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Sale">Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 space_all">
                                <div class="submit_1i1 clearfix">
                                    <h5>Type</h5>
                                    <select class="form-control" name="type" required>
                                        <option disabled selected>Select Type</option>
                                        <option value="House">House</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 space_right">
                                <div class="submit_1i1 clearfix">
                                    <h5>Rooms</h5>
                                    <select class="form-control" name="rooms" required>
                                        <option selected disabled>Select Type</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit_1i clearfix">
                            <div class="col-sm-6 space_left">
                                <div class="submit_1i1 clearfix">
                                    <h5>Price</h5>
                                    <input class="form-control" placeholder="NPR" type="number" name="price" required>
                                </div>
                            </div>
                            <div class="col-sm-6 space_right">
                                <div class="submit_1i1 clearfix">
                                    <h5>Area</h5>
                                    <input class="form-control" placeholder="Sqft" type="number" name="area" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit_1 clearfix">
                        <h4 class="mgt col_1">Property Media</h4>
                        <hr>
                        <div class="submit_1ii clearfix">
                            <span class="span_1"><i class="fa fa-cloud-upload"></i></span>
                            <input type="file" name="image" required>
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
                        <button class="button mgt" type="submit">Submit Property</button>
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
