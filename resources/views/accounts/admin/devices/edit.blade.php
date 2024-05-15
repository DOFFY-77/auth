{{-- resources\views\accounts\manager\devices\edit.blade.php --}}
@extends('layouts.app1')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Device</h1>
    <form action="{{ route('devices.update', $device->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <div class="form-group">
            <label for="establishment_id">Establishment:</label>
            <select class="form-control" name="establishment_id" id="establishment_id">
                <option value="">Select Establishment</option>
                @foreach ($establishments as $establishment)
                <option value="{{ $establishment->id }}" {{ $device->establishment_id == $establishment->id ? 'selected' : '' }}>
                    {{ $establishment->name }}
                </option>
                @endforeach
            </select>
        </div> --}}
        {{-- <div class="form-group">
            <label for="class_id">Classe</label>
            {{-- <pre> --}}
{{-- 
                <select class="form-control" id="class_id" name="class_id">
                    <option value="">Select Classe</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option> --}}
                    {{-- @php
                    var_dump($classes)    
                    @endphp
                    </pre> --}}
              {{-- @endforeach --}}
            {{-- </select> --}}
            
        {{-- </div>  --}}
        <div class="form-group">
            <label for="class_id">Classe:</label>
            <select class="form-control" name="class_id" id="class_id">
                @foreach ($classes as $class)
                <option value="{{ $class->id }}" {{ $device->class_id == $class->id ? 'selected' : '' }}>
                    {{ $class->name }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="type_id">Type:</label>
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $device->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="marque_id">Marque:</label>
            <select class="form-control" name="marque_id" id="marque_id">
                @foreach ($marques as $marque)
                <option value="{{ $marque->id }}" {{ $device->marque_id == $marque->id ? 'selected' : '' }}>
                    {{ $marque->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="active" {{ $device->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $device->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="info_device">Device Info:</label>
            <input type="text" class="form-control" name="info_device" id="info_device" value="{{ $device->info_device }}" required>
        </div>
        <div class="form-group">
            <label for="reference">reference:</label>
            <input type="text" class="form-control" name="reference" id="reference" value="{{ $device->reference }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
{{-- @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        // تحديث الفصول عند تحميل الصفحة
        updateClasses($('#establishment_id').val(), "{{ $device->class_id }}");
    
        $('#establishment_id').on('change', function() {

        });
    
        function updateClasses(establishmentId, selectedClassId = "") {
            if (establishmentId) {
                $.ajax({
                    url: '/getClasses/' + establishmentId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#class_id').empty();
                        $('#class_id').append('<option value="">Select Classe</option>');
                        if (data.length === 0) {
                            $('#class_id').append('<option value="">No Classes Available</option>');
                        } else {
                            $.each(data, function(key, value) {
                                var selected = key == selectedClassId ? "selected" : "";
                                $('#class_id').append('<option value="' + key + '" '+ selected +'>' + value + '</option>');
                            });
                        }
                    }
                });
            } else {
                $('#class_id').empty();
                $('#class_id').append('<option value="">Select Classe</option>');
            }
        }
    });
    </script> --}}
    


