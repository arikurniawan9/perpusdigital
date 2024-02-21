<!-- resources/views/users/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>

                    <div class="card-body">
                        <div><strong>Name:</strong> {{ $user->name }}</div>
                        <div><strong>Email:</strong> {{ $user->email }}</div>
                        <!-- Add other fields as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
