<div class="service-widget mb-50">
    <!-- Widget Title -->
    <div class="widget-title-box mb-30">
        <h3 class="widget-title">Other Services</h3>
    </div>

    <!-- More Service List -->
    <div class="more-service-list">
        <ul>
            @foreach ($otherServices as $service)
            <li>
                <a href="{{ route('service-details', ['slug' => $service->slug]) }}">
                    <div class="more-service-icon">
                        <img src="{{ asset('storage/'.$service->avatar) }}" alt="{{ $service->title }}">
                    </div>
                    <div class="more-service-title">
                        {{ $service->title }}
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="text-center mt-5">
            <a href="{{ route('all-services') }}" class="text-primary">See all</a>            
        </div>
    </div>
</div>