@extends('main-layout.layout')

@section('content')
    <!-- Credentials -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3 sticky-top" style="background-color: #28a745;">
        <div class="container">
            <span class="nav-brand" style="font-weight: bold; color: white;">Please Login or Register to Access Content</span>

            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="color: white;" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"><b>Login</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register" style="color: white;" onmouseover="this.style.color='black'" onmouseout="this.style.color='white'"><b>Register</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @include('section.hero')

    @include('section.services')

    @include('section.sponsors')

    @include('section.questions')

@endsection
