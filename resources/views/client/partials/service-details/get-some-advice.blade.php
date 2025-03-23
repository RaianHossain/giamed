<div class="service-widget mb-50">
    <!-- Widget Title -->
    <div class="widget-title-box mb-30">
        <h3 class="widget-title">Get Some Advice?</h3>
    </div>

    <!-- Contact Form -->
    <form class="service-contact-form" action="{{ route('request-advice') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        <div class="row">
            <!-- Name Input -->
            <div class="col-xl-12">
                <div class="contact-input contact-icon contact-user mb-20">
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
            </div>

            <!-- Email Input -->
            <div class="col-xl-12">
                <div class="contact-input contact-icon contact-mail mb-20">
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <!-- Phone Input -->
            <div class="col-xl-12">
                <div class="contact-input contact-icon contact-phone mb-20">
                    <input type="text" name="phone" placeholder="Enter your phone" required>
                </div>
            </div>

            <!-- Service Selection -->
            <div class="col-xl-12">
                <div class="contact-input contact-icon contact-hourglass">
                    <select name="service_type" id="service-option" required>
                        <option value="" disabled selected>Select type of care</option>
                        <option value="type1">Type 1 Care</option>
                        <option value="type2">Type 2 Care</option>
                        <option value="type3">Type 3 Care</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="ser-form-btn text-center mt-40">
            <button
                type="submit"
                class="btn btn-icon ml-0"
                data-animation="fadeInLeft"
                data-delay=".6s"
                style="animation-delay: 0.6s;"
            >
                <span>+</span>Request for call
            </button>
        </div>
    </form>
</div>