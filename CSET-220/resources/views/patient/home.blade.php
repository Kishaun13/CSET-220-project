@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Home Page</h1>
    <div class="card">
        <div class="card-header">
            Patient Details
        </div>
        <div class="card-body">
            <p><strong>Patient ID:</strong> {{ $patient->id }}</p>
            <p><strong>Patient Name:</strong> {{ $patient->name }}</p>
            <p><strong>Current Date:</strong> {{ $currentDate }}</p>
        </div>
    </div>
</div>
@endsection