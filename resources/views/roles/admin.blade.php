@extends('roles.admgrlayout')

@section('content')

<div class="container mt-5">
    <h1 id="myH1">Admin Tasks</h1>
    <div class="row g-4">
        <div class="col-md-4">
            <form action="#" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Remove & Register, Manager & Admin Accounts</h5>
                    <button class="task-btn" type="submit" name="accounts">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="#" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>View All Transactions</h5>
                    <button class="task-btn" type="submit" name="transactions">Access</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="{{ route('roles.manager') }}" method="GET">
                @csrf
                <div class="task-card h-100">
                    <h5>Access Manager Functionalities</h5>
                    <button class="task-btn" type="submit" name="functionalities">Access</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
