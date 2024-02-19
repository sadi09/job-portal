<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Contact For Any Query</h1>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="fa fa-map-marker-alt text-primary"></i>
                            </div>
                            <span>{{$company_info->address}}</span>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s"
                         style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                 style="width: 45px; height: 45px;">
                                <i class="fa fa-envelope-open text-primary"></i>
                            </div>
                            <span>{{$company_info->email}}</span>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s"
                         style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                        <div class="d-flex align-items-center bg-light rounded p-4">
                            <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                 style="width: 45px; height: 45px;">
                                <i class="fa fa-phone-alt text-primary"></i>
                            </div>
                            <span>{{$company_info->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.site-ui.contact.location-map')
            @include('components.site-ui.contact.contact-form')


        </div>
    </div>
</div>
