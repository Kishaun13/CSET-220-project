@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px; font-family: Arial, sans-serif; background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background-color: #f700ff; color: white; padding: 10px 15px; border-bottom: 1px solid #ddd; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    {{ __('Create Role') }}
                </div>

                <div class="card-body" style="padding: 15px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="padding: 10px; margin-bottom: 15px; border: 1px solid transparent; border-radius: 4px; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf

                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="name" style="display: block; margin-bottom: 5px;">{{ __('Role Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="role_name" value="{{ old('role_name') }}" required autocomplete="name" autofocus style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px;">

                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="access_level" style="display: block; margin-bottom: 5px;">{{ __('Access Level') }}</label>
                            <input id="access_level" type="number" class="form-control @error('access_level') is-invalid @enderror" name="access_level" value="{{ old('access_level') }}" required style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px;">

                            @error('access_level')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; font-size: 14px; font-weight: bold; text-align: center; text-decoration: none; color: white; background-color: #ff00dd; border: none; border-radius: 4px; cursor: pointer;">
                                {{ __('Create Role') }}
                            </button>
                        </div>
                    </form>

                    <hr>

                    <h3>{{ __('Existing Roles') }}</h3>
                    <ul class="list-group" style="list-style-type: none; padding: 0;">
                        @foreach ($roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 15px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 10px; background-color: white;">
                                {{ $role->role_name }}
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="display: inline-block; padding: 5px 10px; font-size: 12px; font-weight: bold; text-align: center; text-decoration: none; color: white; background-color: #dc3545; border: none; border-radius: 4px; cursor: pointer;">
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