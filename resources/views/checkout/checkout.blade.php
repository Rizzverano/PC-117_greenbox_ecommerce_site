@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    <section class="section-checkout bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Billing Details Column -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h3 class="mb-0">Billing Details</h3>
                        </div>
                        <div class="card-body">
                            <form action="" class="billing-form">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="fullname" class="form-label">Full Name:</label>
                                            <input type="text" class="form-control border-success" placeholder="Full name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="location" class="form-label">Hilongos, Leyte Address:</label>
                                            <input type="text" class="form-control border-success" placeholder="Brgy./Street/Sitio...">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <input type="text" class="form-control border-success" placeholder="Phone no.">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" class="form-control border-success" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cart Total Column -->
                <div class="col-lg-5">
                    <div class="card border-success shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h3 class="mb-0">Cart Total</h3>
                        </div>
                        <div class="card-body">
                            <div class="cart-detail cart-total">
                                <p class="d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span>$200.00</span>
                                </p>
                                <p class="d-flex justify-content-between">
                                    <span>Discount</span>
                                    <span>$15.00</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between total-price fw-bold">
                                    <span>Total</span>
                                    <span>$185.00</span>
                                </p>

                                <div class="form-group mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input border-success" type="checkbox" id="guideCheck">
                                        <label class="form-check-label" for="guideCheck">
                                            Request for a cooking guide
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mt-4">
                                    <button class="btn btn-success btn-lg py-3">
                                        Place an order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
