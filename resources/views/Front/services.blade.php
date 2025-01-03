@extends('Front.Partials.master', ['title' => 'Services page'])
@section('service-active', 'active')
@section('header')
    <x-hero-section title="Services" subTitle="Services"></x-hero-section>
@endsection
@section('content')
    <div class="container-xxl py-6">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Services</div>
                <h2 class="mb-5">We Provide Solutions On Your Business</h2>
            </div>
            <div class="row g-4">
                @php
                    $delays = [0.1, 0.3, 0.6];
                    $delayIndex = 0;
                @endphp
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $delays[$delayIndex] }}s">
                        <div class="service-item rounded h-100">
                            <div class="d-flex justify-content-between">
                                <div class="service-icon">
                                    <i class="{{ $service->icon }}"></i>
                                </div>
                                <a class="service-btn" href="">
                                    <i class="fa fa-link fa-2x"></i>
                                </a>
                            </div>
                            <div class="p-5">
                                <h5 class="mb-3">{{ $service->title }}</h5>
                                <span>{{ $service->description }}</span>
                            </div>
                        </div>
                    </div>
                    @php
                        $delayIndex = ($delayIndex + 1) % count($delays);
                    @endphp
                @endforeach

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Testimonial</div>
                <h2 class="mb-5">What Our Clients Say!</h2>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('front-assets') }}/img/testimonial-1.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('front-assets') }}/img/testimonial-2.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('front-assets') }}/img/testimonial-3.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('front-assets') }}/img/testimonial-4.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
