{{-- resources\views\accounts\manager\types\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Types</h1>
    <a href="{{ route('types.create') }}" class="btn btn-success mb-3">Add New Type</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display:inline-block;">
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
