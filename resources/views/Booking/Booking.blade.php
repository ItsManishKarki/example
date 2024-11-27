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
                        <h2 class="mgt">Book Now</h2>
                        <h5><a href="/">Home</a> / Submit Property</h5>
                    </div>
                </div>
                <form action="{{route('booking.property.store',$propertyID)}}" method="POST" enctype="multipart/form-data">
                    <div class="submit_1 clearfix">
                        @csrf
                        <h4 class="mgt col_1">Property Description And Price</h4>
                        <hr>

                        <h5>Contact</h5>
                        <input class="form-control" placeholder="Contact" type="text" name="contact" required>
                        <h5>Address</h5>
                        <input class="form-control" placeholder="Contact" type="text" name="address" required>
                        <input type="hidden" name="property_id" value="{{ $propertyID }}" id="">


                    </div>



                    <div class="submit_3 clearfix">
                        <button class="button mgt" type="submit">Submit Property</button>
                    </div>


                </form>
            </div>
        </div>
    </section>


@endsection
