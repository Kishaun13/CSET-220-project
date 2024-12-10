@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Rosters</h1>
    <form method="GET" action="{{ route('available.rosters') }}" class="mb-4">
        <div class="form-group">
            <label for="date">Filter by Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    @if($rosters->isEmpty())
        <p>No rosters available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Supervisor Name</th>
                    <th>Doctor Name</th>
                    <th>Caregiver 1 Name</th>
                    <th>Caregiver 1 Patient Group</th>
                    <th>Caregiver 2 Name</th>
                    <th>Caregiver 2 Patient Group</th>
                    <th>Caregiver 3 Name</th>
                    <th>Patient Group 3</th>
                    <th>Caregiver 4 Name</th>
                    <th>Patient Group 4</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rosters as $roster)
                    <tr>
                        <td>{{ $roster->supervisor_name }}</td>
                        <td>{{ $roster->doctor_name }}</td>
                        <td>{{ $roster->caregiver_1_name }}</td>
                        <td>{{ $roster->caregiver_1_patient_group }}</td>
                        <td>{{ $roster->caregiver_2_name }}</td>
                        <td>{{ $roster->caregiver_2_patient_group }}</td>
                        <td>{{ $roster->caregiver3_name }}</td>
                        <td>{{ $roster->patient_group3 }}</td>
                        <td>{{ $roster->caregiver4_name }}</td>
                        <td>{{ $roster->patient_group4 }}</td>
                        <td>{{ $roster->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection