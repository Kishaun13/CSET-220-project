<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Appointment;
use App\Models\User;

class AppointmentController extends Controller
{
    public function create()
    {
        // Fetch dates with available doctors
        $datesWithDoctors = Roster::whereNotNull('doctor_name')->pluck('date')->unique();
        return view('admin.appointments.create', compact('datesWithDoctors'));
    }

    public function getDoctors(Request $request)
    {
        $date = $request->query('date');
        $doctors = Roster::where('date', $date)->pluck('doctor_name');
        return response()->json($doctors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'doctor_name' => 'required|string',
        ]);

        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_name' => $request->doctor_name,
            'appointment_date' => $request->appointment_date,
        ]);

        return redirect()->route('admin.appointments.create')->with('success', 'Appointment created successfully!');
    }
}