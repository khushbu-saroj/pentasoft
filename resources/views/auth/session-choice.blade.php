@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Session Conflict</div>
                <div class="card-body">
                    <p>You are already logged in from another device. Do you want to continue with the new session?</p>
                    <form action="{{ route('session.handle') }}" method="POST">
                        @csrf
                        <button type="submit" name="choice" value="new" class="btn btn-success">Continue with New Session</button>
                        <button type="submit" name="choice" value="old" class="btn btn-danger">Keep Old Session</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
