<!-- resources/views/admin/create-role.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Role') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="role_name">{{ __('Role Name') }}</label>
                            <input id="role_name" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ old('role_name') }}" required autocomplete="role_name" autofocus>

                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="access_level">{{ __('Access Level') }}</label>
                            <input id="access_level" type="number" class="form-control @error('access_level') is-invalid @enderror" name="access_level" value="{{ old('access_level') }}" required autocomplete="access_level">

                            @error('access_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Role') }}
                            </button>
                        </div>
                    </form>

                    <hr>

                    <h3>{{ __('Existing Roles') }}</h3>
                    <ul class="list-group">
                        @foreach ($roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $role->role_name }}
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection