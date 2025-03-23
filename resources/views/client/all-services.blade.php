@extends('layouts.clientLayout')
@section('title', 'Services')
@section('content')
    @include('client.partials.inner-hero', ['title' => 'Services', 'subtitle' => 'We are here for your care', 'breadCrumb' => 'Services'])
    <main>
        <!-- shop-banner-area start -->
        <section class="shop-banner-area pt-120 pb-120">
            <div class="container">
                <div class="row mt-20">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="product-showing mb-40">
                            <p>
                                Showing {{ $services->firstItem() }}–{{ $services->lastItem() }} of {{ $services->total() }} results
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-6">
                        <div class="shop-tab f-right">
                            <ul class="nav text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true"><i class="fas fa-th-large"></i> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false"><i class="fas fa-list-ul"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    @foreach($services as $service)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product mb-40">
                                            <div class="product__img">
                                                <a href="{{ route('service-details', ['slug' => $service->slug]) }}"><img src="{{ asset('storage/'.$service->avatar) }}" alt=""></a>
                                                <div class="product-action text-center">
                                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                                    <a href="#"><i class="fas fa-heart"></i></a>
                                                    <a href="porduct-details.html"><i class="fas fa-expand"></i></a>
                                                </div>
                                            </div>
                                            <div class="product__content text-center pt-30">
                                                <span class="pro-cat"><a href="#">Service</a></span>
                                                <h4 class="pro-title"><a href="{{ route('service-details', ['slug' => $service->slug]) }}">Medidove Product</a></h4>
                                                {{-- <div class="price">
                                                    <span>$95.00</span>
                                                    <span class="old-price">$120.00</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @foreach($services as $service)
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product mb-30">
                                            <div class="product__img">
                                                <a href="{{ route('service-details', ['slug' => $service->slug]) }}"><img src="{{ asset('storage/'.$service->avatar) }}" alt="{{ $service->title }}" class="img-fluid"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="product-list-content pt-10 mb-30">
                                            <div class="product__content mb-20">
                                                <span class="pro-cat"><a href="#">Service</a></span>
                                                <h4 class="pro-title"><a href="{{ route('service-details', ['slug' => $service->slug]) }}">{{ $service->title }}</a></h4>
                                               
                                            </div>
                                            <p>{{ $service->description }}</p>
                                            <div class="product-action-list">
                                                <a class="btn btn-theme" href="{{ route('service-details', ['slug' => $service->slug]) }}">Show Details</a>
                                                {{-- <a class="action-btn" href="#"><i class="fas fa-heart"></i></a>
                                                <a class="action-btn" href="porduct-details.html"><i
                                                        class="fas fa-expand"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination basic-pagination-2 text-center mt-20">
                            <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <!-- Custom Pagination -->
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination basic-pagination-2 text-center mt-20">
                            <ul>
                                <!-- Previous Page Link -->
                                @if ($services->onFirstPage())
                                    <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
                                @else
                                    <li><a href="{{ $services->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a></li>
                                @endif

                                <!-- Pagination Elements -->
                                @foreach ($services->links()->elements[0] as $page => $url)
                                    @if ($page == $services->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                <!-- Next Page Link -->
                                @if ($services->hasMorePages())
                                    <li><a href="{{ $services->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
                                @else
                                    <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-banner-area end -->
    </main>
@endsection