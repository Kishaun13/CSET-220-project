@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Role Management</h1>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create New Role</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Access Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->role_name }}</td>
                    <td>{{ $role->access_level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
