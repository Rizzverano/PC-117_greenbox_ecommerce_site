@extends('navlayout.layout')

@section('content')

    @include('section.nav-top')

    @include('section.navbar')

<section class="returns-section">
    <div class="container mt-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-green mb-4">Returns & Exchange Policy</h2>
            <p>We want you to be completely satisfied with your purchase. If you're not happy with your order, we're here to help.</p>

            <h5 class="mt-4">Return Conditions:</h5>
            <ul>
              <li>Items must be returned within 24 hours of receipt.</li>
              <li>Items must be uncooked and in the same condition as received.</li>
              <li>Original packaging must be included.</li>
            </ul>

            <h5 class="mt-4">Exchange Process:</h5>
            <ol>
              <li>Contact our support team with your order number and issue.</li>
              <li>Ship the item back to us using a trackable method. You can type in our contact page.</li>
              <li>Once received, we will send the replacement product.</li>
            </ol>

            <div class="mt-5 mb-5">
              <a href="{{ route('contact') }}" class="btn btn-success">Contact Support</a>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection
