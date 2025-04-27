@extends('roles.admgrlayout')

@section('content')

@include('roles.navbar-mgr')

@include('roles.sidebar-mgr')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <h1 class="mb-4">Manager Dashboard</h1>
        <!-- Dashboard Overview Content -->
        <div id="dashboard-content" class="content-area active">
            <!-- Your dashboard content here -->
            <h2 class="mb-4">Dish Categories Management:</h2>
            <div class="row mb-4 g-4">
                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-carrot card-icon text-success"></i>
                        <h3>Veges & Fruits</h3>
                        <p>Manage vegetable and fruit dishes</p>
                        <a href="{{ route('vegefruits.index') }}"><button class="btn btn-outline-success">Access Category</button></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-drumstick-bite card-icon text-success"></i>
                        <h3>Meats</h3>
                        <p>Manage meat dishes</p>
                        <a href="{{ route('meats.index') }}"><button class="btn btn-outline-success">Access Category</button></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-fish card-icon text-success"></i>
                        <h3>Seafoods</h3>
                        <p>Manage seafood dishes</p>
                        <a href="{{ route('seafoods.index') }}"><button class="btn btn-outline-success">Access Category</button></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-book card-icon text-success"></i>
                        <h3>Cooking Procedures</h3>
                        <p>Manage cooking procedures</p>
                        <button class="btn btn-outline-success">Manage Procedures</button>
                    </div>
                </div>

                <h2 class="my-4">Notifications:</h2>

                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-clipboard-list card-icon text-success"></i>
                        <h3>Customer Orders</h3>
                        <p>No such notification...</p>
                        <button class="btn btn-outline-success">Go to Section</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card text-center p-4">
                        <i class="fas fa-exchange-alt card-icon text-success"></i>
                        <h3>Returns & Exchange</h3>
                        <p>No such notification...</p>
                        <button class="btn btn-outline-success">Go to Section</button>
                    </div>
                </div>

                <!-- More dashboard cards... -->
            </div>
        </div>

        <!-- Other content areas (same as before) -->
        <div>
            <!-- Content... -->
        </div>

        <!-- More content areas... -->
    </div>

@endsection
