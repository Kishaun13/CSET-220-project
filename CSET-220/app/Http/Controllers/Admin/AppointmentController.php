<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Roster;

class AppointmentController extends Controller
{
    public function create()
    {
        // Fetch dates with available doctors
        $datesWithDoctors = Roster::pluck('date')->unique();
        return view('admin.appointments.create', compact('datesWithDoctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'appointment_date' => 'required|date',
            'doctor_name' => 'required|string',
        ]);

        // Create the appointment
        $appointment = Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_name' => $request->doctor_name,
            'appointment_date' => $request->appointment_date,
        ]);

        // Find the roster for the appointment date
        $roster = Roster::where('date', $request->appointment_date)->firstOrFail();

        // Update the patient columns in the roster table
        if (is_null($roster->patient_id)) {
            $roster->patient_id = $request->patient_id;
        } elseif (is_null($roster->patient_2_id)) {
            $roster->patient_2_id = $request->patient_id;
        } elseif (is_null($roster->patient_3_id)) {
            $roster->patient_3_id = $request->patient_id;
        } else {
            return redirect()->route('admin.appointments.create')->with('error', 'The roster is full for this date.');
        }

        $roster->save();

        return redirect()->route('admin.appointments.create')->with('success', 'Appointment created successfully!');
    }

    public function getDoctors(Request $request)
    {
        $date = $request->query('date');
        $roster = Roster::where('date', $date)->first();
        $doctors = $roster ? [$roster->doctor_name] : [];
        return response()->json($doctors);
    }
}