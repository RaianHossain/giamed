@extends('layouts.clientMasterLayout')
@section('title', 'Home')
@section('layoutContent')
    <main>
        <!-- hero-area start -->
        @include('client.partials.home.hero')
        <!-- hero-area end -->

        <!-- about-area start -->
        @include('client.partials.home.home-about')
        <!-- about-area end -->

        <!-- services-area start -->
        @include('client.partials.home.home-services', ['services' => $services])
        <!-- services-area end -->

        <!-- facts start -->
        @include('client.partials.home.home-fact')
        <!-- facts end -->

        <!-- team-area start -->
        @include('client.partials.home.home-brands');
        <!-- team-area end -->

        <!-- trust-us-area start -->
        @include('client.partials.home.home-trust-us');
        <!-- trust-us-area end -->

        <!-- blog-area start -->
        {{-- @include('client.partials.home.home-blogs'); --}}
        <!-- blog-area end -->
        
        {{-- <div style='height: 200px; background-color: rgba(19, 35, 47, 0.94); padding-top: 0px !important; margin-top: 0px !important;'></div> --}}
        <div style='height: 200px;'></div>
        <!-- Footer -->
        @include('client.partials.footer')

    </main>
@endsection
