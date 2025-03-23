<section class="breadcrumb-bg pt-200 pb-180" style="background-image: url('{{ asset('assets/client/img/important/giamedical_cover.jpeg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="page-title">
                    <p class="small-text pb-15 text-white">{{ $subtitle }}</p>
                    <h1 class="text-white">{{ $title }}</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                <div class="page-breadcumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $breadCrumb }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>