@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-shipping')

    <section class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Image with Overlay Text -->
                <div class="col-md position-relative p-0">
                    <h1 class="fw-bold position-absolute top-0 start-50 translate-middle-x mb-0"
                        style="font-size: clamp(3rem, 8vw, 5rem); z-index: 1; color: #28a745;">
                        Green<span class="fw-bold text-dark">Box</span>
                    </h1>
                    <img src="img/gb-removebg-preview.png"
                         class="img-fluid w-100 position-relative"
                         alt="GreenBox"
                         style="z-index: 0;">
                </div>

                <!-- Text Content -->
                <div class="col-md p-4 p-lg-5">
                    <div class="card shadow-sm border-0 p-3 p-md-4 bg-white rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h2 class="mb-4">Shipping Information</h2>
                            <p class="fs-5 mb-4">
                                <i class="fas fa-shipping-fast me-2" style="color: #28a745;"></i>
                                We are committed to providing accurate and reliable shipping services to ensure your orders are delivered
                                on time and in perfect condition. Our team carefully processes and packages each item, and we work with
                                trusted shipping partners to guarantee safe and efficient delivery.
                            </p>
                            <p class="fs-5 mb-0">
                                <i class="fas fa-truck me-2" style="color: #28a745;"></i>
                                You will receive tracking information once your order is dispatched, allowing you to monitor its progress.
                                If you have any questions or concerns about your shipment, our customer support team is here to assist you
                                every step of the way.
                            </p>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-3">Need help with your order?</p>
                        <a href="{{ route('contact') }}" class="btn btn-success px-4 py-2 me-2">
                            <i class="fas fa-headset me-2"></i>Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
