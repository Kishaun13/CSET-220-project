<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Role Dropdown -->
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required onchange="toggleFields()">
                                    <option value="">{{ __('Select Role') }}</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" data-is-employee="{{ in_array(strtolower($role->role_name), ['doctor', 'caretaker', 'supervisor']) ? 'true' : 'false' }}" data-is-patient="{{ strtolower($role->role_name) === 'patient' ? 'true' : 'false' }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Patient Fields -->
                        <div id="patient-fields" style="display: none;">
                            <!-- Date of Birth Input -->
                            <div class="row mb-3">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>
                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Family Code Input -->
                            <div class="row mb-3">
                                <label for="family_code" class="col-md-4 col-form-label text-md-end">{{ __('Family Code') }}</label>
                                <div class="col-md-6">
                                    <input id="family_code" type="text" class="form-control @error('family_code') is-invalid @enderror" name="family_code">
                                    @error('family_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Number Input -->
                            <div class="row mb-3">
                                <label for="emergency_contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Emergency Contact Number') }}</label>
                                <div class="col-md-6">
                                    <input id="emergency_contact_number" type="text" class="form-control @error('emergency_contact_number') is-invalid @enderror" name="emergency_contact_number">
                                    @error('emergency_contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Relation to Patient Input -->
                            <div class="row mb-3">
                                <label for="relation_to_patient" class="col-md-4 col-form-label text-md-end">{{ __('Relation to Patient') }}</label>
                                <div class="col-md-6">
                                    <input id="relation_to_patient" type="text" class="form-control @error('relation_to_patient') is-invalid @enderror" name="relation_to_patient">
                                    @error('relation_to_patient')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Employee Fields -->
                        <div id="employee-fields" style="display: none;">
                            <!-- Phone Input -->
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have an account? Login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFields() {
        var roleSelect = document.getElementById('role');
        var patientFields = document.getElementById('patient-fields');
        var employeeFields = document.getElementById('employee-fields');
        var selectedOption = roleSelect.options[roleSelect.selectedIndex];
        var isEmployee = selectedOption.getAttribute('data-is-employee') === 'true';
        var isPatient = selectedOption.getAttribute('data-is-patient') === 'true';

        if (isEmployee) {
            employeeFields.style.display = 'block';
            patientFields.style.display = 'none';
        } else if (isPatient) {
            patientFields.style.display = 'block';
            employeeFields.style.display = 'none';
        } else {
            patientFields.style.display = 'none';
            employeeFields.style.display = 'none';
        }
    }
</script>
@endsection