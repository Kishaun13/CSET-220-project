@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Medicines for {{ $patient->name }}</h1>
    <form method="POST" action="{{ route('doctor.updatePatient', ['patient_id' => $patient->patient_id]) }}">
        @csrf
        <div class="form-group">
            <label for="morning_med">Morning Medicine:</label>
            <input type="text" id="morning_med" name="morning_med" class="form-control" value="{{ old('morning_med', $patient->morning_med) }}">
        </div>
        <div class="form-group">
            <label for="afternoon_med">Afternoon Medicine:</label>
            <input type="text" id="afternoon_med" name="afternoon_med" class="form-control" value="{{ old('afternoon_med', $patient->afternoon_med) }}">
        </div>
        <div class="form-group">
            <label for="night_med">Night Medicine:</label>
            <input type="text" id="night_med" name="night_med" class="form-control" value="{{ old('night_med', $patient->night_med) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Medicines</button>
    </form>
</div>
@endsection