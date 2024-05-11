{{-- resources/views/classes/index.blade.php --}}
@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Classes List</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-success mb-3">Add New Class</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Establishment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->name }}</td>
                    <td>{{ $classe->establishment?->name }}</td>
                    <td>
                        <a href="{{ route('classes.edit', $classe) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('classes.destroy', $classe) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
