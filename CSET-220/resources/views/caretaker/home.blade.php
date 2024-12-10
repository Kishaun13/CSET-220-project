@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Caretaker's Home Page</h1>
    <form method="GET" action="{{ route('caretaker.home') }}" class="mb-4">
        <div class="form-group">
            <label for="date">Filter by Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $date }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <h2>Patients on Roster</h2>
    @if($patients->isEmpty())
        <p>No patients on the roster for this date.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->patient_id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>
                            <a href="{{ route('caretaker.patient', ['patient_id' => $patient->patient_id]) }}" class="btn btn-primary">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection