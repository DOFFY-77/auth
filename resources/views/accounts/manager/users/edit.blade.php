{{-- resources\views\accounts\manager\users\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="pin">Pin</label>
            <input type="pin" class="form-control" id="pin" name="pin" value="{{ $user->pin }}" required>
        </div>
        <!-- Password update is usually handled separately due to security reasons -->
        <div class="form-group">
            <label for="account_type">Account Type</label>
            <select class="form-control" id="account_type" name="account_type">
                <option value="Super_Admin" {{ $user->type == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="Admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
