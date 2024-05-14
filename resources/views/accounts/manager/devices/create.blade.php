{{-- resources\views\accounts\manager\devices\create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Add New Device</h1>
    <form action="{{ route('devices.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="establishment_id">Establishment</label>
            <select class="form-control" id="establishment_id" name="establishment_id">
                <option value="">Select Establishment</option>
                @foreach ($establishments as $establishment)
                    <option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="class_id">Classe</label>
            <select class="form-control" id="class_id" name="class_id">
              <option value="">Select Classe</option>
              @foreach ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
              @endforeach
            </select>
            
        </div>
        <div class="form-group">
            <label for="type_id">Type</label>
            <select class="form-control" id="type_id" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="marque_id">Marque</label>
            <select class="form-control" id="marque_id" name="marque_id">
                @foreach ($marques as $marque)
                    <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="info_device">Device Info:</label>
            <input type="text" class="form-control" name="info_device" id="info_device" required>
        </div>
        <div class="form-group">
            <label for="reference">reference:</label>
            <input type="text" class="form-control" name="reference" id="reference" required>
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#establishment_id').on('change', function() {
    var establishmentId = $(this).val();

    if (establishmentId) {
      $.ajax({
        url: '/getClasses/' + establishmentId,
        type: "GET",
        dataType: "json",
        success: function(data) {
          $('#class_id').empty();
          if (data.length === 0) {
            $('#class_id').append('<option value="">No Classes Available</option>');
          } else {
            $.each(data, function(key, value) {
              $('#class_id').append('<option value="' + key + '">' + value + '</option>');
            });
          }
        }
      });
    } else {
      $('#class_id').empty();
    }
  });
});


</script>

@endsection
