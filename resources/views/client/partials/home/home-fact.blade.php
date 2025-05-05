<!-- Fact Area -->
<section class="fact-area fact-map primary-bg position-relative pt-115 pb-60">
    <div class="container">
        <div class="row">
            <!-- Left Side -->
            <div class="col-xl-6 col-lg-6 col-md-10">
                <div class="section-title position-relative mb-45">
                    <div class="section-text section-text-white position-relative">
                        <h5>Delivering Quality & Reliability</h5>
                        <h1 class="white-color">Trusted Medical Equipment for Over 30 Years</h1>
                    </div>
                </div>
                <p class="white-color mb-30">
                    GIA Medical is committed to providing high-quality dialysis equipment at unbeatable prices. From <strong>DLR Programs</strong> to <strong>After-Sales Warranty</strong> and <strong>BMT Training</strong>, we ensure unmatched reliability.
                </p>
                {{-- <div class="section-button section-button-left mb-30">
                    <a data-animation="fadeInLeft" data-delay=".6s" href="contact.html" class="btn btn-icon ml-0">
                        <span>+</span> Contact Us
                    </a>
                </div> --}}
            </div>

            <!-- Right Side -->
            <div class="col-lg-6 col-lg-6 col-md-8">
                <div class="cta-satisfied" id="satisfied">
                    <!-- Single Satisfied -->
                    <div class="single-satisfied mb-50">
                        <h1>30+</h1>
                        <h5>
                            <i class="fas fa-calendar-check"></i> Years of Experience
                        </h5>
                        <p>
                            Serving the dialysis community with <strong>top-tier equipment</strong> and <strong>customer support</strong>.
                        </p>
                    </div>

                    <!-- Single Satisfied -->
                    <div class="single-satisfied mb-50">
                        <h1>99%</h1>
                        <h5>
                            <i class="far fa-smile"></i> Customer Satisfaction
                        </h5>
                        <p>
                            Our commitment to quality ensures <strong>long-lasting reliability</strong> at a <strong>fraction of the cost</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function handleResponsiveClass() {
    const element = document.getElementById('satisfied'); // change to your target element
    const isMobile = window.matchMedia("(max-width: 768px)").matches;

    if (isMobile) {
        element.classList.remove('cta-satisfied');
    } else {
        element.classList.add('cta-satisfied');
    }
}

    // Run once on page load
    handleResponsiveClass();

    // Re-run on resize
    window.addEventListener('resize', handleResponsiveClass);
</script>