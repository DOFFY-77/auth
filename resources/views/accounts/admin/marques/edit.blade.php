{{-- resources\views\accounts\admin\marques\edit.blade.php --}}
@extends('layouts.app1')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Marque</h1>
    <form action="{{ route('marques.update', $marque->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $marque->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
