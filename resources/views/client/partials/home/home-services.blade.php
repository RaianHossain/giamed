<!-- CSS for Styling -->
<style>
    .service-description {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .read-more {
        cursor: pointer;
        color: rgb(63, 63, 210);
        text-decoration: underline;
    }

    .read-more:hover {
        text-decoration: none;
    }
</style>


<section class="servcies-area gray-bg pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="section-title text-center pos-rel mb-75">
                    <div class="section-icon">
                        <img class="section-back-icon" src="img/section/section-back-icon.png" alt="">
                    </div>
                    <div class="section-text pos-rel">
                        <h5>Services</h5>
                        <h1>Reliable Solutions for Medical Equipment</h1>
                    </div>
                    <div class="section-line pos-rel">
                        <img src="img/shape/section-title-line.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-box text-center mb-30">
                        <div class="service-thumb">
                            <img src="{{ asset('storage/' . $service->avatar) }}" alt="">
                        </div>
                        <div class="service-content">
                            <h3><a href="{{route('service-details', ['slug' => $service->slug])}}">{{ $service->title }}</a></h3>
                            <p class="service-description">
                                <!-- Truncated Description -->
                                <span class="truncated">{{ Str::limit($service->short_description, 100, '...') }}</span>
                                <!-- Full Description (Hidden by Default) -->
                                <span class="full" style="display: none;">{{ $service->short_description }}</span>
                            </p>
                            <a class="service-link read-more" href="javascript:void(0);" >Read More</a>
                            <!-- Read More Link -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript for Toggle Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const readMoreLinks = document.querySelectorAll('.read-more');

            readMoreLinks.forEach(link => {
                link.addEventListener('click', function () {
                    const serviceContent = this.closest('.service-content');
                    const truncated = serviceContent.querySelector('.truncated');
                    const full = serviceContent.querySelector('.full');

                    if (truncated.style.display === 'none') {
                        truncated.style.display = 'inline';
                        full.style.display = 'none';
                        this.textContent = 'Read More';
                        this.style.color = 'blue';
                    } else {
                        truncated.style.display = 'none';
                        full.style.display = 'inline';
                        this.textContent = 'See Less';
                        this.style.color = 'blue';
                    }
                });
            });
        });
    </script>
</section>