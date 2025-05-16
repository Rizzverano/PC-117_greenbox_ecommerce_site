@extends('roles.admgr-layout')

@section('title', 'Ingredients Management System')

@section('content')
@include('roles.navbar-ad')
@include('roles.sidebar-ad')

<div class="main-content" id="mainContent">
    <h1 class="my-4">Admin Dashboard</h1>

    <div id="dashboard-content" class="content-area active">
        <h2 class="mb-4">Remove or Register Admin & Manager Account:</h2>
        <div class="row mb-4 g-4">
            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-users-cog card-icon text-success"></i>
                    <h3>Account Management</h3>
                    <p>Manage Admin & Manager Accounts</p>
                    <button class="btn btn-outline-success go-to-section" data-target="account-content">
                        Go to section
                    </button>
                </div>
            </div>

            <h2 class="mb-1">Notifications:</h2>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-receipt card-icon text-success"></i>
                    <h3>All Transactions</h3>
                    <p>No such notification...</p>
                    <button class="btn btn-outline-success go-to-section" data-target="transaction-content">
                        Go to section
                    </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card dashboard-card text-center p-4">
                    <i class="fas fa-user-shield card-icon text-success"></i>
                    <h3>Manager Dashboard</h3>
                    <p>No such notification...</p>
                    <a href="{{ route('roles.manager') }}" class="btn btn-outline-success">
                        Go to Page
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- AJAX Content Areas -->
    <div id="account-content" class="content-area"></div>
    <div id="transaction-content" class="content-area"></div>
</div>
@endsection
