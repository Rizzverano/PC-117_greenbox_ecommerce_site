@extends('roles.admgr-layout')

@section('title', 'Ingredients Management System')

@section('content')
@include('roles.navbar-mgr')
@include('roles.sidebar-mgr')

<div class="main-content" id="mainContent">
    <h1 class="my-4">Manager Dashboard</h1>

    <div id="dashboard-content" class="content-area active">
        <h2 class="mb-4">Ingredients Management System:</h2>
        <div class="row mb-4 g-4">
            <!-- Cards here... -->
            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-list card-icon text-success"></i>
                    <h3>Dish Categories</h3>
                    <p>Manage dish & ingredients</p>
                    <button class="btn btn-outline-success go-to-section" data-target="categories-content">
                        Manage Categories
                    </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-book card-icon text-success"></i>
                    <h3>Cooking Procedures</h3>
                    <p>Manage cooking procedures</p>
                    <button class="btn btn-outline-success go-to-section" data-target="procedures-content">
                        Manage Procedures
                    </button>
                </div>
            </div>

            <h2 class="mb-1">Notifications:</h2>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-clipboard-list card-icon text-success"></i>
                    <h3>Customer Orders</h3>
                    <p>No such notification...</p>
                    <button class="btn btn-outline-success go-to-section" data-target="orders-content">
                        Go to Section
                    </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-exchange-alt card-icon text-success"></i>
                    <h3>Returns & Exchange</h3>
                    <p>No such notification...</p>
                    <button class="btn btn-outline-success go-to-section" data-target="returns-content">
                        Go to Section
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX Content Areas -->
    <div id="categories-content" class="content-area"></div>
    <div id="orders-content" class="content-area"></div>
    <div id="procedures-content" class="content-area"></div>
    <div id="returns-content" class="content-area"></div>
</div>
@endsection
