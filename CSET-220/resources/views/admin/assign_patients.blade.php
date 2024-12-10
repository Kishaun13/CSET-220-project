@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assign Patients to Roster</h1>
    <form method="POST" action="{{ route('admin.assignPatients') }}">
        @csrf
        <div class="form-group">
            <label for="roster_id">Roster ID:</label>
            <input type="text" id="roster_id" name="roster_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="patient_ids">Patient IDs (comma-separated):</label>
            <input type="text" id="patient_ids" name="patient_ids" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Assign Patients</button>
    </form>
</div>
@endsection