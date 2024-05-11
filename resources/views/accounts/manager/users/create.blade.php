{{-- resources\views\accounts\manager\users\create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Create New User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
    <small class="form-text text-muted">
        Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.
    </small>
</div>
<div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
</div>

        <div class="form-group">
            <label for="pin">PIN</label>
            <input type="text" class="form-control" id="pin" name="pin" required>
        </div>
        <div class="form-group">
            <label for="account_type">Account Type</label>
            <select class="form-control" id="account_type" name="account_type">
                <option value="2">Super Admin</option>
                <option value="1">Admin</option>
                <option value="0" selected>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
