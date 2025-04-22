@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-privacy-pol')

    <section class="bg-light py-5">
        <div class="container">

            <div class="pb-md-5 bg-white p-4 rounded shadow-sm">
                <p class="text-justify text-dark">
                    <i class="fa-solid fa-shield-halved me-2" style="color: #28a745;"></i>
                    "Your privacy is important to us. Our Privacy Policy explains how we collect, use, protect, and share your personal information when you use our services. By accessing or using our platform, you consent to the practices described in this policy.
                </p>
                <p class="text-justify text-dark">
                    <i class="fa-solid fa-shield me-2" style="color: #28a745;"></i>
                    We are committed to safeguarding your data and ensuring transparency in how we handle it. Please review our Privacy Policy carefully to understand your rights and how we manage your information."
                </p>
            </div>
        </div>
    </section>

@endsection
