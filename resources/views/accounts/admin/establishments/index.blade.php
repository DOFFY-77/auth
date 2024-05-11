{{-- resources\views\accounts\admin\establishments\index.blade.php --}}
@extends('layouts.app1')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Establishments List</h1>
    <a href="{{ route('establishments.create') }}" class="btn btn-success mb-3">Create New Esbtalishment</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($establishments as $establishment)
            <tr>
                <td>{{ $establishment->name }}</td>
                <td>{{ $establishment->ville }}</td>
                <td>
                    <a href="{{ route('establishments.edit', $establishment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('establishments.destroy', $establishment->id) }}" method="POST" style="display: inline-block;">
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
