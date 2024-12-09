@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Patient Management') }}</div>

                <div class="card-body">
                    {{-- Display success messages --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Patient List --}}
                    <h2>All Patients</h2>
                    <ul>
                        @if(isset($patients))
                            @forelse($patients as $patientItem)
                                <li>{{ $patientItem->patient_id }}</li>
                            @empty
                                <li>No patients found.</li>
                            @endforelse
                        @elseif(isset($patient))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Name</th>
                                        <th>User ID</th>
                                        <th>Date of Birth</th>
                                        <th>Family Code</th>
                                        <th>Emergency Contact Number</th>
                                        <th>Relation to Patient</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $patient->patient_id }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->user_id }}</td>
                                        <td>{{ $patient->date_of_birth }}</td>
                                        <td>{{ $patient->family_code }}</td>
                                        <td>{{ $patient->emergency_contact_number }}</td>
                                        <td>{{ $patient->relation_to_patient }}</td>
                                        <td>{{ $patient->created_at }}</td>
                                        <td>{{ $patient->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <li>No patients found.</li>
                        @endif
                    </ul>

                    {{-- Search Patient --}}
                    <h2>Search Patient</h2>
                    <form action="{{ route('admin.getPatient') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="patient_id">Patient ID:</label>
                            <input type="text" id="patient_id" name="patient_id" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    {{-- Display Patient Name --}}
                    @if(isset($patient))
                        <h2>Patient Name: {{ $patient->name }}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection