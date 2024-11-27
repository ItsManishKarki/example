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
                        <h2 class="mgt">SCAN QR</h2>
                        <h5><a href="/">Home</a> / SCAN QR</h5>
                    </div>
                    <section>
                        <span> USE THIS ID AS REFRENCES ( {{ $property->id }} )</span>

                        <div class="qr" style="padding: 5px;">
                            <img src="/img/qr.png" alt="">
                        </div>
                    </section>

                </div>

            </div>
        </div>
    </section>


@endsection
