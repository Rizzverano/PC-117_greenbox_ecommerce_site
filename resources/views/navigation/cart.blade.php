@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.cart-hero')

    <div class="container py-4 mb-5">
        <!-- Category Filter Tabs -->
        <div class="category-filter nav nav-tabs" id="categoryTabs">
            <a class="nav-link active" href="#" data-target="cart-section">Cart</a>
            <a class="nav-link" href="#" data-target="order-section">Order History</a>
            <a class="nav-link" href="#" data-target="purchase-section">My Purchase</a>
        </div>

        <!-- Cart Section -->
        <section class="section-container active" id="cart-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-list table-responsive">
                        <table class="table table-success">
                            <thead>
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Cooking guide</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center align-middle">
                                    <td class="product-remove">
                                        <a href="#"><i class="fas fa-times"></i></a>
                                    </td>
                                    <td class="img-product">
                                        <img src="img/calamari.jpg" alt="product-img" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h5>Calamari</h5>
                                    </td>
                                    <td class="price">$200.00</td>
                                    <td class="quantity">
                                        <div class="input-group justify-content-center">
                                            <button class="btn btn-outline-secondary quantity-left-minus"
                                                type="button">-</button>
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number text-center" value="1"
                                                min="1" max="100" style="max-width: 50px;">
                                            <button class="btn btn-outline-secondary quantity-right-plus"
                                                type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="total">$200.00</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-primary btn-sm">Download</button>
                                    </td>
                                </tr>
                                <!-- Additional cart items can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- QR Coupon Code -->
                <div class="col-lg-6 mt-4 cart-wrap">
                    <div class="coupon-code mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Coupon code">
                                <button class="btn btn-success" type="button">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Cart Total -->
                <div class="col-lg-6 mt-4 cart-wrap">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span class="cart-subtotal">$200.00</span>
                        </p>
                        <p class="d-flex justify-content-between">
                            <span>Discount</span>
                            <span>$15.00</span>
                        </p>
                        <hr>
                        <p class="d-flex justify-content-between total-price">
                            <span>Total</span>
                            <span class="cart-grand-total fw-bold">$185.00</span>
                        </p>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('checkout') }}" class="btn btn-success py-3">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Order History Section -->
        <section class="section-container" id="order-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-list table-responsive">
                        <table class="table table-success">
                            <thead>
                                <tr class="text-center">
                                    <th>Order Date</th>
                                    <th>Order #</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center align-middle">
                                    <td>March 28, 2025</td>
                                    <td>#1001</td>
                                    <td>
                                        <div>Calamari (1)</div>
                                        <div>Shrimp (2)</div>
                                    </td>
                                    <td>$850.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Reorder</button>
                                        <button class="btn btn-sm btn-outline-success">Details</button>
                                    </td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <td>March 25, 2025</td>
                                    <td>#1000</td>
                                    <td>
                                        <div>Salmon (1)</div>
                                    </td>
                                    <td>$500.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-success">Reorder</button>
                                        <button class="btn btn-sm btn-outline-success">Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- My Purchase Section -->
        <section class="section-container" id="purchase-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-success">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1001</td>
                                    <td>March 28, 2025</td>
                                    <td>
                                        <div>Calamari (1)</div>
                                        <div>Shrimp (2)</div>
                                    </td>
                                    <td>3</td>
                                    <td>$850.00</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td><button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-danger btn-sm">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1000</td>
                                    <td>March 30, 2025</td>
                                    <td>Calamari (1)</td>
                                    <td>1</td>
                                    <td>$200.00</td>
                                    <td><span class="badge bg-primary">Processing</span></td>
                                    <td>
                                        <button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-danger btn-sm">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1000</td>
                                    <td>March 25, 2025</td>
                                    <td>Salmon (1)</td>
                                    <td>1</td>
                                    <td>$500.00</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td>
                                        <button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-primary btn-sm">Return</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('section.services')

@endsection
