@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctor's Home Page</h1>
    <form method="GET" action="{{ route('doctor.home') }}" class="mb-4">
        <div class="form-group">
            <label for="date">Filter by Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <h2>Upcoming Appointments</h2>
    @if($upcomingAppointments->isEmpty())
        <p>No upcoming appointments.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($upcomingAppointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_id }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>
                            <a href="{{ route('doctor.patient', ['patient_id' => $appointment->patient_id, 'appointment_date' => $appointment->appointment_date]) }}" class="btn btn-primary">Add Medicines</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>Old Appointments</h2>
    @if($oldAppointments->isEmpty())
        <p>No old appointments.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($oldAppointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_id }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection