<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - RealState</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/global.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @yield('styles')
</head>

<body>
<section id="top">
    <div class="container">
        <div class="row">
            <div class="top_1 clearfix">
                <div class="col-sm-6">
                    <div class="top_1l clearfix">
                        <ul>
                            <li><i class="fa fa-phone"></i>+977 9812345678</li>
                            <li><i class="fa fa-map-marker"></i> Itahari Nepal</li>
                            <li><i class="fa fa-envelope-o"></i> info@realstate.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="top_1r pull-right clearfix">
                        @guest()
                            <ul>
                                <li><a class="col" href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
                                <li><a class="col" href="{{route('register')}}"><i class="fa fa-sign-in"></i> Register</a></li>

                            </ul>
                        @else
                            <ul>
                                <li><a class="col" >{{ Auth::user()->name }}</a></li>
                                <li><a class="col" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="header" class="clearfix cd-secondary-nav">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"> <i class="fa fa-home"></i> <span> RealState</span> </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav_1">
                    <li><a class="m_tag {{(request()->is('/')) ? 'active_tab' :''}}" href="/">Home</a></li>
                    <li><a class="m_tag {{(request()->is('property')) ? 'active_tab' :''}}"
                           href="{{route('property')}}">Property</a></li>

                    <li><a class="m_tag {{(request()->is('contact')) ? 'active_tab' :''}}" href="{{route('contact')}}">Contact</a>
                        @auth()
                    <li><a class="m_tag {{(request()->is('my-property')) ? 'active_tab' :''}}" href="{{route('my.property')}}">My Properties</a>


                        @endauth
                        @auth()
                    <li><a class="m_tag {{(request()->is('my-booking')) ? 'active_tab' :''}}" href="{{route('my.booking')}}">My Booking</a>


                        @endauth
                    </li>
                </ul>


                @auth()
                    <ul class="nav navbar-nav navbar-right nav_2">
                        <li><a class="m_tag button mgt" href="{{route('property.user')}}">Submit Property</a></li>
                    </ul>
                @endauth

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

</section>

@yield('content')

<section id="footer">
    <div class="container">
        <div class="row">

            <div class="footer_2 clearfix">
                <div class="col-sm-8">
                    <div class="footer_2l clearfix">
                        <p class="col_3">© {{date('Y')}} RealState. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2500);
    }
</script>
<script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.number-spinner button', function () {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });
</script>

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

@yield('scripts')

</body>

</html>
