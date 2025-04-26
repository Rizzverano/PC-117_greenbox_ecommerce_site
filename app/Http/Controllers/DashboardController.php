<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('user.home');
    }

    public function about()
    {
        return view('navigation.about');
    }

    public function ship()
    {
        return view('navigation.shippingInfo');
    }

    public function terms()
    {
        return view('navigation.terms-condition');
    }

    public function privacy()
    {
        return view('navigation.privacy');
    }

    public function contact()
    {
        return view('navigation.contact');
    }

    public function cart()
    {
        return view('navigation.cart');
    }

    public function checkout()
    {
        return view('checkout.checkout');
    }

    public function returns()
    {
        return view('navigation.returns');
    }

    public function shop()
    {
        return view('navigation.shop');
    }
}
