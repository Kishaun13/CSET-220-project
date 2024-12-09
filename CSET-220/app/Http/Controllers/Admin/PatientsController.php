<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    public function showPatients()
    {
        $patients = Patient::all();
        return view('admin.patients.patients', compact('patients'));
    }

    public function getPatient(Request $request)
    {
        $patient = Patient::where('patient_id', $request->input('patient_id'))->first();
        return view('admin.patients.patients', compact('patient'));
    }
}