@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-terms-con')

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
                    <h2 class="mb-4">Terms & Conditions</h2>
                    <p class="text-dark mb-3">
                        "By accessing or using our services, you agree to comply with and be bound by our Terms and Conditions, which outline the rules, guidelines, and responsibilities governing your use of our platform.
                    </p>
                    <p class="text-dark mb-4">
                        Please read these terms carefully, as they include important information about your rights, obligations, and limitations. If you do not agree to these terms, you must refrain from using our services."
                    </p>
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-success mx-2 px-4">Agree</a>
                        <a href="#" class="btn btn-outline-success mx-2 px-4">Disagree</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
