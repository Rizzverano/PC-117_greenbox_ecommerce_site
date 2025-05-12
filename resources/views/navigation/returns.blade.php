@extends('navreturn.layout')

@section('content')
    @include('section.nav-top')

    @include('section.navbar')

    @include('partials.bg-returns')

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="text-center green-bg p-3 rounded">
                    <i class="fas fa-exchange-alt me-2"></i>Returns & Exchange
                </h1>
                <p class="text-center text-muted mt-3">Please fill out the form below to request a return or exchange</p>
            </div>
        </div>

        <div class="row">
            <!-- Product to Return Card -->
            <div class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <i class="fas fa-box-open me-2"></i>Product You're Returning
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img src="https://via.placeholder.com/150" alt="Product Image"
                                    class="img-fluid product-img mb-3">
                            </div>
                            <div class="col-md-9">
                                <h4>Calamari • Seafoods</h4>
                                <p class="text-muted">Order #12345 • Purchased on June 15, 2023</p>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <p><strong>Price:</strong> $200.00</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Quantity:</strong> 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reason for Return -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <i class="fas fa-question-circle me-2"></i>Reason for Return
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="returnReason" class="form-label">Select a reason:</label>
                            <select class="form-select reason-select" id="returnReason">
                                <option selected disabled>Choose a reason...</option>
                                <option value="wrong-item">Wrong item received</option>
                                <option value="damaged">Item arrived damaged</option>
                                <option value="defective">Item is defective</option>
                                <option value="not-as-described">Item not as described</option>
                                <option value="no-longer-needed">No longer needed</option>
                                <option value="better-price">Found better price elsewhere</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="returnDetails" class="form-label">Additional details (optional):</label>
                            <textarea class="form-control" id="returnDetails" rows="3"
                                placeholder="Please provide any additional details about your return..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <i class="fas fa-camera me-2"></i>Upload Photos
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Please upload photos of the product you're returning. This helps us
                            process your request faster.</p>
                        <div id="uploadContainer" class="upload-area">
                            <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: var(--primary-green);"></i>
                            <p>Drag & drop your photos here or click to browse</p>
                            <input type="file" id="productImages" class="d-none" accept="image/*" multiple>
                            <button class="btn green-btn mt-2" onclick="document.getElementById('productImages').click()">
                                <i class="fas fa-upload me-2"></i>Select Files
                            </button>
                        </div>
                        <div id="imagePreview" class="mt-3 text-center">
                            <p class="text-muted">No images selected</p>
                            <div id="previewContainer" class="d-flex flex-wrap justify-content-center"></div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn green-btn btn-lg" type="button" id="submitReturn">
                        <i class="fas fa-paper-plane me-2"></i>Submit Return Request
                    </button>
                </div>
            </div>

            <!-- Return Summary Card -->
            <div class="col-md-4">
                <div class="card shadow-sm summary-card">
                    <div class="card-header">
                        <i class="fas fa-clipboard-list me-2"></i>Return Summary
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3">Order Details</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>$200.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax:</span>
                            <span>$10.40</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold mb-3">
                            <span>Total:</span>
                            <span>$210.40</span>
                        </div>

                        <h5 class="mb-3 mt-4">Return Method</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="returnMethod" id="refund" checked>
                            <label class="form-check-label" for="refund">
                                Refund to original payment method
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="returnMethod" id="exchange">
                            <label class="form-check-label" for="exchange">
                                Exchange for another item
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="returnMethod" id="storeCredit">
                            <label class="form-check-label" for="storeCredit">
                                Store credit
                            </label>
                        </div>

                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle me-2"></i>
                            Your refund will be processed within 5-7 business days after we receive your return.
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-header">
                        <i class="fas fa-truck me-2"></i>Return Shipping
                    </div>
                    <div class="card-body">
                        <p>Please ship your return to:</p>
                        <address>
                            <strong>Returns Department</strong><br>
                            R.V. Fulache St.<br>
                            Hilongos, Leyte<br>
                            Brgy. Eastern Poblacion
                        </address>
                        <p class="text-muted">Include the return label with your package.</p>
                        <button class="btn btn-outline-success w-100">
                            <i class="fas fa-receipt me-2"></i>Request Return Label
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
