@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-contact')

    <section class="contact-section bg-light">
        <div class="container py-3">
            <div class="row mb-5">

                <div class="row d-flex mb-5 contact-info g-4">
                    <div class="col-md-3 d-flex">
                        <div class="info bg-white p-4 rounded shadow-sm border border-success border-opacity-25 w-100">
                            <p class="mb-0"><span class="fw-bold text-success">Address:</span> R.V. Fulache St. Hilongos,
                                Leyte Brgy. Eastern Poblacion</p>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="info bg-white p-4 rounded shadow-sm border border-success border-opacity-25 w-100">
                            <p class="mb-0"><span class="fw-bold text-success">Phone:</span> <a href="tel:+1235235598"
                                    class="text-decoration-none text-dark">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="info bg-white p-4 rounded shadow-sm border border-success border-opacity-25 w-100">
                            <p class="mb-0"><span class="fw-bold text-success">Email:</span> <a
                                    href="mailto:info@yoursite.com"
                                    class="text-decoration-none text-dark">info@yoursite.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="info bg-white p-4 rounded shadow-sm border border-success border-opacity-25 w-100">
                            <p class="mb-0"><span class="fw-bold text-success">Website:</span> <a href="#"
                                    class="text-decoration-none text-dark">www.yoursite.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="row block-9 g-4">
                    <!-- Left Column (Image) -->
                    <div class="col-lg-6 d-flex">
                        <div class="bg-white p-1 rounded shadow-sm border border-success border-opacity-25 w-100 h-100">
                            <img src="img/addressMap.png" alt="mapAddress"
                                class="img-fluid rounded w-100 h-100 object-fit-cover">
                        </div>
                    </div>

                    <!-- Right Column (Form) -->
                    <div class="col-lg-6 d-flex">
                        <form action="#"
                            class="bg-white p-4 p-md-5 contact-form rounded shadow-sm border border-success border-opacity-25 w-100 h-100">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control py-3 border-success border-opacity-50"
                                    placeholder="Your Name">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" class="form-control py-3 border-success border-opacity-50"
                                    placeholder="Your Email">
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" class="form-control py-3 border-success border-opacity-50"
                                    placeholder="Subject">
                            </div>
                            <div class="form-group mb-4">
                                <textarea cols="30" rows="7" class="form-control border-success border-opacity-50" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success py-3 px-5 text-white fw-bold">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
