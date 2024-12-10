<!-- resources/views/admin/appointments/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Appointment</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.appointments.store') }}">
        @csrf
        <div class="form-group">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <select id="appointment_date" name="appointment_date" class="form-control" required>
                <option value="">Select a date</option>
                @foreach($datesWithDoctors as $date)
                    <option value="{{ $date }}">{{ $date }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor:</label>
            <select id="doctor_name" name="doctor_name" class="form-control" required>
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Appointment</button>
    </form>
</div>

<script>
    document.getElementById('appointment_date').addEventListener('change', function() {
        var appointmentDate = this.value;
        fetch(`{{ route('admin.appointments.doctors') }}?date=${appointmentDate}`)
            .then(response => response.json())
            .then(doctors => {
                var doctorSelect = document.getElementById('doctor_name');
                doctorSelect.innerHTML = '';
                doctors.forEach(function(doctor) {
                    var option = document.createElement('option');
                    option.value = doctor;
                    option.textContent = doctor;
                    doctorSelect.appendChild(option);
                });
            });
    });
</script>
@endsection