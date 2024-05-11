{{-- resources\views\accounts\manager\classes\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Class</h1>
    <form action="{{ route('classes.update', $classe) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Class Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $classe->name }}" required>
        </div>
        <div class="form-group">
            <label for="establishment_id">Establishment</label>
            <select class="form-control" id="establishment_id" name="establishment_id">
                @foreach ($establishments as $establishment)
                    <option value="{{ $establishment->id }}" {{ $classe->establishment_id == $establishment->id ? 'selected' : '' }}>
                        {{ $establishment->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
