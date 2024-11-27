@extends('layouts.app')
@section('title','Property')
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
                                @foreach($properties as $index => $property)
                                    <div class="col-sm-6 space_left" style="padding: 4px;">
                                        <div class="feature_2im clearfix">
                                            <div class="feature_2im1 clearfix">
                                                <a href="{{route('property.detail',$property->id)}}"><img src="img/{{$property->image}}" class="iw" height="150px" width="45px" alt="abc"></a>
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
                                                    <h5 class="bold"><a href="#">NPR {{$property->price}}</a></h5>
                                                    @if(Auth::user())
                                                    @php
                                                        $booking = $property->booking->where('user_id',Auth::id())->first();
                                                    @endphp
                                                    @if($booking && $booking->isAprove == 0)

                                                            <a href="{{ route('scan.qr',$property->id) }}" style="text-decoration: underline; margin-top: 15px;">pay</a>
                                                            @elseif($booking && $booking->isAprove == 1)
                                                            <a href="" style="text-decoration: underline; margin-top: 15px;">booked</a>
                                                            @else
                                                            <a href="{{ route('booking.property',$property->id) }}" style="text-decoration: underline; margin-top: 15px;">booking</a>
                                                            @endif

                                                    @else
                                                    <a href="{{ route('login') }}" onclick="return confirm('Please Login to Booking')" style="text-decoration: underline; margin-top: 15px;">Booking</a>

                                                    @endif

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

                            <div class="product_1_last text-center clearfix">
                                <div class="col-sm-12">
                                    <ul>
                                        {{$properties->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="col-sm-3 space_left">
                            <div class="center_list_1r1 clearfix">
                                <h4 class="head_1 mgt">Filter By price</h4>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="100000-200000" id="">
                                    <label for="">100000-2,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="200000-300000" id="">
                                    <label for="">2,00,000-3,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox"  name="price[]" value="300000-400000" id="">
                                    <label for="">3,00,000-4,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="500000-600000" id="">
                                    <label for="">5,00,000-6,00,000</label>
                                </div>


                            </div>
                        </div>

                    </form>

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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="price[]"]').change(function() {
            if ($(this).is(':checked')) {
                // Get the value of the checked checkbox
                var selectedValue = $(this).val();

                // Redirect the user to the desired page with the selected value as a query parameter
                window.location.href = '/propery-filter?price=' + selectedValue;
            }
        });
    });
</script>

@endsection
