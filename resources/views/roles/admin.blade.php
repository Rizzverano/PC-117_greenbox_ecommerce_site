@extends('roles.admgrlayout')

@section('content')

@include('roles.navbar-ad')

@include('roles.sidebar-ad')

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <h1 class="mb-4">Admin Dashboard</h1>
    <!-- Dashboard Overview Content -->
    <div id="dashboard-content" class="content-area active">
        <!-- Your dashboard content here -->
        <h2 class="mb-4">Notifications:</h2>
        <div class="row mb-4 g-4">
            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-receipt card-icon text-success"></i>
                    <h3>All Transactions</h3>
                    <p>No such notification...</p>
                    <button class="btn btn-outline-success">Go to section</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-user-shield card-icon text-success"></i>
                    <h3>Manager Dashboard</h3>
                    <p>No such notification...</p>
                    <a href="{{ route('roles.manager') }}"><button class="btn btn-outline-success">Go to Page</button></a>
                </div>
            </div>

            <!-- More dashboard cards... -->
        </div>
    </div>

    <!-- Other content areas (same as before) -->
    <div id="transaction-content" class="content-area">
        <h2><i class="fas fa-receipt me-2"></i> All Transcations</h2>
        <!-- Content... -->
    </div>

    <!-- More content areas... -->
</div>

@endsection
