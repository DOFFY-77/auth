{{-- resources\views\accounts\manager\marques\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Marques</h1>
    <a href="{{ route('marques.create') }}" class="btn btn-success mb-3">Add New Marque</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marques as $marque)
            <tr>
                <td>{{ $marque->name }}</td>
                <td>
                    <a href="{{ route('marques.edit', $marque->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('marques.destroy', $marque->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
