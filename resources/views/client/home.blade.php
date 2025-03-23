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
        @include('client.partials.home.home-blogs');
        <!-- blog-area end -->

        <!-- Footer -->
        @include('client.partials.footer')

    </main>
@endsection
