@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Family Home Page</h1>
    <form method="POST" action="{{ route('family.showPatient') }}">
        @csrf
        <div class="form-group">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="family_code">Family Code:</label>
            <input type="text" id="family_code" name="family_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Show Patient</button>
    </form>
</div>
@endsection