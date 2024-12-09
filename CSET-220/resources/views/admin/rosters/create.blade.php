@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Roster</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.rosters.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="supervisor_name">Supervisor Name</label>
            <input type="text" class="form-control" id="supervisor_name" name="supervisor_name" required>
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor Name</label>
            <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
        </div>
        <div class="form-group">
            <label for="caregiver_1_name">Caregiver 1 Name</label>
            <input type="text" class="form-control" id="caregiver_1_name" name="caregiver_1_name" required>
        </div>
        <div class="form-group">
            <label for="caregiver_1_patient_group">Caregiver 1 Patient Group</label>
            <input type="text" class="form-control" id="caregiver_1_patient_group" name="caregiver_1_patient_group">
        </div>
        <div class="form-group">
            <label for="caregiver_2_name">Caregiver 2 Name</label>
            <input type="text" class="form-control" id="caregiver_2_name" name="caregiver_2_name">
        </div>
        <div class="form-group">
            <label for="caregiver_2_patient_group">Caregiver 2 Patient Group</label>
            <input type="text" class="form-control" id="caregiver_2_patient_group" name="caregiver_2_patient_group">
        </div>
        <div class="form-group">
            <label for="caregiver3_name">Caregiver 3 Name</label>
            <input type="text" class="form-control" id="caregiver3_name" name="caregiver3_name">
        </div>
        <div class="form-group">
            <label for="patient_group3">Patient Group 3</label>
            <textarea class="form-control" id="patient_group3" name="patient_group3"></textarea>
        </div>
        <div class="form-group">
            <label for="caregiver4_name">Caregiver 4 Name</label>
            <input type="text" class="form-control" id="caregiver4_name" name="caregiver4_name">
        </div>
        <div class="form-group">
            <label for="patient_group4">Patient Group 4</label>
            <textarea class="form-control" id="patient_group4" name="patient_group4"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Create Roster</button>
    </form>
</div>
@endsection