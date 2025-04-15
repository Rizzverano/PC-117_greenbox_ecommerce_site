@extends('navlayout.layout')

@section('content')
    @include('section.nav-top')

    @include('section.navbar')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4 display-4 font-weight-bold text-success" style="font-weight: bold;">Welcome to
                                GreenBox</h2>
                            <p class="lead text-muted">Your eCommerce destination for fresh ingredients</p>
                        </div>
                    </div>

                    <div class="pb-md-5">
                        <p class="mb-4 fs-5">Fresh, organic, and ready-to-cook ingredients—delivered straight to your
                            kitchen in real time! At GreenBox, we take the hassle out of cooking by bringing you the finest
                            farm-fresh produce and sustainably sourced proteins, so every meal starts with the best.</p>

                        <p class="mb-4 fs-5">We work closely with local farmers and trusted suppliers to ensure top-quality
                            ingredients in every delivery. Our real-time system keeps waste to a minimum and guarantees peak
                            freshness, saving you time while keeping flavor at its best.</p>

                        <p class="mb-5 fs-5">Committed to sustainability and healthy living, we make it easy to whip up
                            delicious, wholesome meals with our eco-friendly approach and thoughtfully curated selections.
                            Plus, enjoy free shipping on all items—because great food should come with no extra cost! And
                            for your convenience, we offer easy Cash on Delivery—no upfront payments, just simple,
                            hassle-free transactions when your order arrives.</p>

                        <p class="mb-5 fs-5">Enjoy freshness, convenience, and quality—right at your doorstep with GreenBox!</p>

                        <p><a href="{{ route('home') }}" class="btn btn-success btn-lg px-5 py-3 fs-5">Shop Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
