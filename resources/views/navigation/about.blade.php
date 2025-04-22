@extends('navlayout.layout')

@section('content')
    @include('section.nav-top')

    @include('section.navbar')

    <div class="hero-bread" style="background-image: url('img/vegesfruits.jpg')">
        <div class="hero-container">
            <div class="hero-content">
                <h1>About Us</h1>
                <div class="divider mx-auto bg-white" style="height: 3px; width: 80px;"></div>
            </div>
        </div>
    </div>

    <section class="about-section">
        <div class="about-container">
            <div class="about-grid">
                <div class="about-image" style="background-image: url(img/about.jpg);"></div>
                <div class="about-content">
                    <div class="about-header">
                        <h2>Welcome to GreenBox an eCommerce website</h2>
                    </div>
                    <div class="about-text">
                        <p><i class="fa-solid fa-leaf me-2" style="color: #28a745;"></i>GreenBox is your go-to source for fresh, organic, and ready-to-cook ingredients delivered in
                            real-time. We make cooking easier by providing high-quality, farm-fresh produce and
                            sustainably sourced proteins, ensuring every meal starts with the best ingredients.</p>
                        <p><i class="fa-solid fa-leaf me-2" style="color: #28a745;"></i>By partnering with local farmers and trusted suppliers, we guarantee freshness and quality
                            with every delivery. Our real-time system minimizes waste and ensures you get ingredients at
                            their peak, saving you time and effort without compromising on taste.</p>
                        <p><i class="fa-solid fa-leaf me-2" style="color: #28a745;"></i>At GreenBox, we're committed to sustainability and healthy living. With our eco-friendly
                            approach and carefully curated selections, we help you cook delicious, wholesome meals
                            effortlessly. Experience freshness, convenience, and quality—delivered straight to your
                            door!</p>
                        <p><a href="{{ route('home') }}" class="shop-button btn btn-success">Shop now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
