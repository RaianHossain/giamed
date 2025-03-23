@extends('layouts.clientLayout')
@section('title', 'About')
@section('content')
    @include('client.partials.inner-hero', ['title' => 'About Us', 'subtitle' => 'We are here for your care', 'breadCrumb' => 'About'])
    <main>
        @include('client.partials.about.about-details')
        @include('client.partials.about.about-counter')
        @include('client.partials.about.about-contact')
        @include('client.partials.about.about-teams')
        @include('client.partials.about.about-testimonials')
    </main>
@endsection