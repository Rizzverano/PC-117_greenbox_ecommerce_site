@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-terms-con')

    <section class="bg-light py-5">
        <div class="container">

            <div class="pb-md-5 bg-white p-4 rounded shadow-sm">
                <p class="text-justify text-dark">
                    "By accessing or using our services, you agree to comply with and be bound by our Terms and Conditions, which outline the rules, guidelines, and responsibilities governing your use of our platform.
                </p>
                <p class="text-justify text-dark">
                    Please read these terms carefully, as they include important information about your rights, obligations, and limitations. If you do not agree to these terms, you must refrain from using our services."
                </p>

                <div class="text-center mt-4">
                    <a href="#"><button class="btn btn-success mx-2 px-4">Agree</button></a>
                    <a href="#"><button class="btn btn-success mx-2 px-4 bg-transparent text-success hover-bg-success hover-text-white border-success">Disagree</button></a>
                </div>
            </div>
        </div>
    </section>

@endsection
