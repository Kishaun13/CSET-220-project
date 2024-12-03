<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function showEmployees()
    {
        $employees = Employee::with('role')->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function updateEmployee(Request $request, Employee $employee)
    {
        $request->validate([
            'salary' => 'required|numeric',
        ]);

        $employee->salary = $request->input('salary');
        $employee->save();

        return redirect()->route('admin.employees.index')->with('success', 'Employee salary updated successfully.');
    }
}