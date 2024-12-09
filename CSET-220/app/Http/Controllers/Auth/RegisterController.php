<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,id'],
        ];

        if (isset($data['role'])) {
            // Additional validation rules based on role can be added here
        }

        return Validator::make($data, $rules);
    }

    protected function create(array $data)
    {
        $role = Role::find($data['role']);
        $isAdmin = $role && strtolower($role->role_name) === 'admin' ? 1 : 0;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role'],
            'is_admin' => $isAdmin,
        ]);

        if ($role && strtolower($role->role_name) === 'patient') {
            Patient::create([
                'user_id' => $user->id,
                'name' => $data['name'], 
                'date_of_birth' => $data['date_of_birth'],
                'family_code' => $data['family_code'],
                'emergency_contact_number' => $data['emergency_contact_number'],
                'relation_to_patient' => $data['relation_to_patient'],
            ]);
        } elseif ($role && in_array(strtolower($role->role_name), ['doctor', 'caretaker', 'supervisor'])) {
            Employee::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role_id' => $data['role'],
                'salary' => 0, // Default salary value
            ]);
        }

        return $user;
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('thankyou');
    }
}