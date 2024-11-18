@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Role</h1>
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role_name">Role Name</label>
            <input type="text" name="role_name" id="role_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="access_level">Access Level</label>
            <input type="number" name="access_level" id="access_level" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Role</button>
    </form>
</div>
@endsection
