@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-privacy-pol')

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
                <div class="col-md p-4 p-lg-5 bg-white rounded shadow-sm">
                    <h2>Privacy & Policy</h2>
                    <p class="text-justify text-dark"><i class="fa-solid fa-shield-halved me-2" style="color: #28a745;"></i>
                        "Your privacy is important to us. Our Privacy Policy explains how we collect, use, protect, and share your personal information when you use our services. By accessing or using our platform, you consent to the practices described in this policy.
                    </p>
                    <p class="text-justify text-dark"><i class="fa-solid fa-shield me-2" style="color: #28a745;"></i>
                        We are committed to safeguarding your data and ensuring transparency in how we handle it. For any privacy-related concerns or inquiries, our dedicated 24/7 customer support team is always available to assist you. We provide unlimited support to address your questions about data protection, account security, or any other privacy matters.
                    </p>
                    <p class="text-justify text-dark"><i class="fa-solid fa-shield-halved me-2" style="color: #28a745;"></i>
                        Please review our Privacy Policy carefully to understand your rights and how we manage your information. Your trust is our priority, and we're here to help whenever you need us."
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
