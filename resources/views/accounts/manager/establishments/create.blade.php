{{-- resources\views\accounts\manager\establishments\create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Create New Establishment</h1>
    <form action="{{ route('establishments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="Complexe">Complexe:</label>
            <input type="text" class="form-control" id="Complexe" name="Complexe" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
