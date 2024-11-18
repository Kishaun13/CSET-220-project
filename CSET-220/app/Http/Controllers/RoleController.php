<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Show the form to create a new role
    public function create()
    {
        return view('admin.create-role');
    }

    // Store the newly created role
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'role_name' => 'required|string|max:255',
            'access_level' => 'required|integer|min:1',
        ]);

        // Create the new role
        Role::create([
            'role_name' => $request->role_name,
            'access_level' => $request->access_level,
        ]);

        // Redirect to a success page or back to the roles list
        return redirect()->route('admin.roles.create')->with('success', 'Role created successfully.');
    }
}
