@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    <section class="bg-light py-5">
        <div class="container">
            <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                   <h2 class="mb-4 text-center text-success">Terms & Conditions</h2>
                </div>
            </div>
            <div class="pb-md-5 bg-white p-4 rounded shadow-sm">
                <p class="text-justify text-dark">
                    "By accessing or using our services, you agree to comply with and be bound by our Terms and Conditions, which outline the rules, guidelines, and responsibilities governing your use of our platform.
                </p>
                <p class="text-justify text-dark">
                    Please read these terms carefully, as they include important information about your rights, obligations, and limitations. If you do not agree to these terms, you must refrain from using our services."
                </p>

                {{-- <div class="text-center mt-4">
                    <a href="{{ route('welcome') }}"><button class="btn btn-success mx-2 px-4">Agree</button></a>
                    <a href="{{ route('welcome') }}"><button class="btn btn-danger mx-2 px-4">Disagree</button></a>
                </div> --}}
            </div>
        </div>
    </section>

@endsection
