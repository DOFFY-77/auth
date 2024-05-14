{{-- resources\views\accounts\admin\establishments\edit.blade.php --}}
@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Establishment</h1>
    <form action="{{ route('establishments.update', $establishment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $establishment->name }}" required>
        </div>
        <div class="form-group">
            <label for="Complexe">Complexe:</label>
            <input type="text" class="form-control" id="Complexe" name="Complexe" value="{{ $establishment->Complexe }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

