@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Existing Rosters</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach ($rosters as $roster)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $roster->supervisor_name }} - {{ $roster->doctor_name }} - {{ $roster->date }}
                <form action="{{ route('admin.rosters.destroy', $roster->roster_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this roster?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection