@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')


    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="heading-section-bold mb-5 text-center">
                        <h2 class="mb-4 display-5 fw-bold" style="color: #28a745;">Shipping Information</h2>
                        <div class="divider mx-auto bg-success" style="height: 3px; width: 80px;"></div>
                    </div>

                    <div class="card shadow-sm border-0 p-4 p-md-5 bg-white rounded-3">
                        <div class="card-body">
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

                    <div class="mt-4 text-center">
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
