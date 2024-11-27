@extends('layouts.app')
@section('title','Contact')
@section('styles')
    <link href="{{asset('css/contact.css')}}" rel="stylesheet">
@endsection
@section('content')

    <section id="center" class="center_blog clearfix">
        <div class="container">
            <div class="row">
                <div class="center_blog_1 text-center clearfix">
                    <div class="col-sm-12">
                        <h2 class="mgt">CONTACT US</h2>
                        <h5><a href="#">Home</a> / Contact Us</h5>
                    </div>
                </div>

                <div class="contact_1 clearfix">
                    <div class="col-sm-12 space_all">
                        <div class="col-sm-8">
                            <div class="contact_1il clearfix">
                                <h4 class="mgt">CONTACT US</h4>
                                <form action="{{route('contact.store')}}" method="POST">
                                    @csrf
                                    <input class="form-control" placeholder="Name" name="name" type="text">
                                    <input class="form-control" placeholder="Email" name="email" type="text">
                                    <textarea placeholder="Message" class="form-control form_1" name="message"></textarea>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact_1ir clearfix">
                                <h4 class="head_1 mgt">CONTACT DETAILS</h4><br><br>
                                <p class="col">Please find below contact details and contact us today!</p><br>
                                <h5 class="col"><i class="fa fa-map-marker"></i> Itahari, Nepal</h5>
                                <h5 class="col"><i class="fa fa-phone"></i> +977 981345678</h5>
                                <h5 class="col"><i class="fa fa-envelope"></i> info@realstate.com</h5>
                                <h5 class="col"><i class="fa fa-clock-o"></i> 9:00 a.m - 7:00 p.m</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            /*****Fixed Menu******/
            var secondaryNav = $('.cd-secondary-nav'),
                secondaryNavTopPosition = secondaryNav.offset().top;
            $(window).on('scroll', function () {
                if ($(window).scrollTop() > secondaryNavTopPosition) {
                    secondaryNav.addClass('is-fixed');
                } else {
                    secondaryNav.removeClass('is-fixed');
                }
            });

        });
    </script>
@endsection
