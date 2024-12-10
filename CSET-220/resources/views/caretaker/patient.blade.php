@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Details</h1>
    <div class="card">
        <div class="card-header">
            Patient ID: {{ $patient->patient_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $patient->name }}</h5>
            <p class="card-text">Morning Medicine: {{ $patient->morning_med }}</p>
            <p class="card-text">Afternoon Medicine: {{ $patient->afternoon_med }}</p>
            <p class="card-text">Night Medicine: {{ $patient->night_med }}</p>
            <!-- Add more patient details here as needed -->
        </div>
    </div>

    <h2>Update Logs</h2>
    <form method="POST" action="{{ route('caretaker.updateLogs', ['patient_id' => $patient->patient_id]) }}">
        @csrf
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="morning_med_given" name="morning_med_given" {{ $patient->morning_med_given ? 'checked' : '' }}>
            <label class="form-check-label" for="morning_med_given">Morning Medicine Given</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="afternoon_med_given" name="afternoon_med_given" {{ $patient->afternoon_med_given ? 'checked' : '' }}>
            <label class="form-check-label" for="afternoon_med_given">Afternoon Medicine Given</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="night_med_given" name="night_med_given" {{ $patient->night_med_given ? 'checked' : '' }}>
            <label class="form-check-label" for="night_med_given">Night Medicine Given</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="food_given" name="food_given" {{ $patient->food_given ? 'checked' : '' }}>
            <label class="form-check-label" for="food_given">Food Given</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Logs</button>
    </form>

    <a href="{{ route('caretaker.home') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection