@extends('layouts.clientLayout')
@section('title', $service->title)

@section('content')
    <!-- Service Hero Section -->
    @include('client.partials.inner-hero', [
        'subtitle' => 'We are here for your care.',
        'title' => $service->title,
        'breadCrumb' => 'Details',
    ])

    <!-- Service Details Area -->
    <div class="service-details-area pt-120 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    @include('client.partials.service-details.details', ['service' => $service])
                </div>
                <div class="col-xl-5 col-lg-4">
                    @include('client.partials.service-details.other-services', ['otherServices' => $otherServices])
                    @include('client.partials.service-details.get-some-advice')
                    <div class="service-widget mb-50 border-0 p-0">
                        <div class="banner-widget">
                            <a href="#">
                                <!-- <img src="assets/img/services/services-banner.png" alt=""> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Details Area End -->
@endsection