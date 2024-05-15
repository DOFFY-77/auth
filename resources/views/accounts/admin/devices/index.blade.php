{{-- resources\views\accounts\manager\devices\index.blade.php --}}
@extends('layouts.app1')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-2">Device List</h1>
    <a href="{{ route('devices.create') }}" class="btn btn-success mb-3">Add New Device</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Reference</th>
                <th>Type</th>
                <th>Status</th>
                <th>Establishment</th>
                <th>Class</th>
                <th>Marque</th>
                <th>Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)
            <tr>
                <td>{{ $device->reference }}</td>
                <td>{{ $device->type->name }}</td>
                <td>{{ $device->status }}</td>
                <td>{{ $device->class->establishment->name }}</td>
                <td>{{ $device->class->name }}</td>
                <td>{{ $device->marque->name }}</td>
                <td>{{ $device->info_device }}</td>
                <td>
                    <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline-block;">
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
