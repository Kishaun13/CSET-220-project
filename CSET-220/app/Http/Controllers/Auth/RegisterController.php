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
            $role = Role::find($data['role']);
            if ($role && strtolower($role->role_name) === 'patient') {
                $rules = array_merge($rules, [
                    'date_of_birth' => ['required', 'date'],
                    'family_code' => ['required', 'string', 'max:255'],
                    'emergency_contact_number' => ['required', 'string', 'max:20'],
                    'relation_to_patient' => ['required', 'string', 'max:255'],
                ]);
            } elseif ($role && in_array(strtolower($role->role_name), ['doctor', 'caretaker', 'supervisor'])) {
                $rules = array_merge($rules, [
                    'phone' => ['required', 'string', 'max:20'],
                ]);
            }
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