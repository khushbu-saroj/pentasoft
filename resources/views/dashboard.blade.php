@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h3>Welcome, {{ $user->name }}!</h3>
        </div>
        <div class="card-body">
            <p>Email: {{ $user->email }}</p>
            <p>Account Created: {{ $user->created_at->format('d M Y') }}</p>

            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            
        </div>
    </div>
</div>
@endsection
