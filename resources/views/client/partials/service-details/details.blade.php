<article class="service-details-box">
    <!-- Service Details Thumbnail -->
    <div class="service-details-thumb mb-80">
        <img
            class="img"
            src="{{ asset('storage/'. $service->avatar) }}"
            alt="{{ $service->title }}"
            style="width: 650px; height: 406px;"
        />
    </div>

    <!-- Section Title -->
    <div class="section-title pos-rel mb-45">
        <div class="section-icon">
            <img
                class="section-back-icon back-icon-left"
                src="{{ asset('assets/client/img/section/section-back-icon-sky.png') }}"
                alt="Background Icon"
            />
        </div>
        <div class="section-text pos-rel">
            <h5 class="green-color text-up-case">{{ $service->title }}</h5>
            <h1>{{$service->short_description}}</h1>
        </div>
        <div class="section-line pos-rel">
            <img
                src="{{ asset('assets/client/img/shape/section-title-line-new.jpg') }}"
                alt="Section Line"
            />
        </div>
    </div>

    <!-- Service Details Text -->
    <div class="service-details-text mb-30">
        <!-- Content goes here -->
        {!! $service->content !!}
    </div>

    <!-- Free Downloads Section -->
    {{-- @include('client.partials.service-details.free-downloads') --}}
</article>