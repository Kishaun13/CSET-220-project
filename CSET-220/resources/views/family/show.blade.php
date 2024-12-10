@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Information</h1>
    <div class="card">
        <div class="card-header">
            Patient Details
        </div>
        <div class="card-body">
            <p><strong>Patient ID:</strong> {{ $patient->patient_id }}</p>
            <p><strong>Patient Name:</strong> {{ $patient->name }}</p>
            <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
            <p><strong>Family Code:</strong> {{ $patient->family_code }}</p>
            <p><strong>Emergency Contact Number:</strong> {{ $patient->emergency_contact_number }}</p>
            <p><strong>Relation to Patient:</strong> {{ $patient->relation_to_patient }}</p>
            <p><strong>Morning Medicine:</strong> {{ $patient->morning_med }}</p>
            <p><strong>Afternoon Medicine:</strong> {{ $patient->afternoon_med }}</p>
            <p><strong>Night Medicine:</strong> {{ $patient->night_med }}</p>
            <p><strong>Current Date:</strong> {{ $currentDate }}</p>
        </div>
    </div>

    <h2>Upcoming Appointments</h2>
    @if($upcomingAppointments->isEmpty())
        <p>No upcoming appointments.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($upcomingAppointments as $appointment)
                    <tr>
                        <td>{{ $appointment->doctor_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection