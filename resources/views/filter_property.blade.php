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
                                @foreach($priceBetween as $property)
                                    <div class="col-sm-6 space_left" style="padding: 4px;">
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


                        </div>
                    </div>
                    <form action="" method="get">
                        <div class="col-sm-3 space_left">
                            <div class="center_list_1r1 clearfix">
                                <h4 class="head_1 mgt">Filter By price</h4>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="100000-200000" id=""
                                    {{ in_array('100000-200000', (array) session('price')) ? 'checked' : '' }}
                                    >
                                    <label for="">100,000-2,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="200000-300000" id=""
                                    {{ in_array('200000-300000', (array) session('price')) ? 'checked' : '' }}
                                    >
                                    <label for="">2,00,000-3,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox"  name="price[]" value="300000-400000" id=""
                                    {{ in_array('300000-400000', (array) session('price')) ? 'checked' : '' }}
                                    >
                                    <label for="">3,00,000-4,00,000</label>
                                </div>
                                <div class="divs">
                                    <input type="checkbox" name="price[]" value="500000-600000" id=""
                                    {{ in_array('500000-600000', (array) session('price')) ? 'checked' : '' }}
                                    >
                                    <label for="">5,00,000-6,00,000</label>
                                </div>


                            </div>
                        </div>

                    </form>


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



