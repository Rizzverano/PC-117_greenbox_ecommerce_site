@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    <section class="bg-light py-5">
        <div class="container">
            <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                   <h2 class="mb-4 text-center text-success">Privacy &amp; Policy</h2>
                </div>
            </div>
            <div class="pb-md-5 bg-white p-4 rounded shadow-sm">
                <p class="text-justify text-dark">
                    "Your privacy is important to us. Our Privacy Policy explains how we collect, use, protect, and share your personal information when you use our services. By accessing or using our platform, you consent to the practices described in this policy.
                </p>
                <p class="text-justify text-dark">
                    We are committed to safeguarding your data and ensuring transparency in how we handle it. Please review our Privacy Policy carefully to understand your rights and how we manage your information."
                </p>
            </div>
        </div>
    </section>

@endsection
