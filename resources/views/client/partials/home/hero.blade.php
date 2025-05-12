<style>
    @media (max-width: 768px) {
        #hero-title {font-size: 2.5rem;}
    }
</style>

<section class="hero-area">
    <div class="hero-slider">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center" style="background-image: url('{{asset('assets/client/img/important/giamedical_cover.jpeg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="hero-text">
                                <div class="hero-slider-caption">
                                    <h5 data-animation="fadeInUp" data-delay=".2s" style="color: white;">
                                        Dialysis Solutions for Less
                                    </h5>
                                    <h1 data-animation="fadeInUp" data-delay=".4s" style="color: white;" id="hero-title">
                                        Advanced Technology in Healthcare
                                    </h1>
                                    <p data-animation="fadeInUp" data-delay=".6s" style="color: white;">
                                        Explore our range of cutting-edge dialysis machines and life-saving medical solutions. Trusted by professionals, designed for patients.
                                    </p>
                                </div>
                                <div class="hero-slider-btn">
                                    <a data-animation="fadeInLeft" data-delay=".6s" href="{{ route('shop') }}" class="btn btn-icon ml-0">
                                        <span>+</span>Explore Our Products
                                    </a>
                                    {{-- <a data-animation="fadeInRight" data-delay="1.0s" href="https://www.youtube.com/watch?v=XWHQT3qJTFk" class="play-btn popup-video">
                                        <i class="fas fa-play"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Additional Sliders Can Be Added Here --}}
        </div>
    </div>
</section>
