<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function home(Request $request)
    {
        $doctorName = Auth::user()->name;
        $date = $request->query('date');
        $today = Carbon::now()->toDateString();

        if ($date) {
            $appointments = Appointment::where('doctor_name', $doctorName)
                ->whereDate('appointment_date', $date)
                ->get();
        } else {
            $appointments = Appointment::where('doctor_name', $doctorName)
                ->orderBy('appointment_date', 'desc')
                ->get();
        }

        $upcomingAppointments = $appointments->where('appointment_date', '>=', $today);
        $oldAppointments = $appointments->where('appointment_date', '<', $today);

        return view('doctor.home', compact('upcomingAppointments', 'oldAppointments', 'date'));
    }

    public function patient($patient_id, Request $request)
    {
        $appointment_date = $request->query('appointment_date');
        $today = Carbon::now()->toDateString();

        // Check if the current date is the date of an appointment
        $appointment = Appointment::where('patient_id', $patient_id)
            ->where('appointment_date', $today)
            ->first();

        if (!$appointment) {
            return redirect()->route('doctor.home')->with('error', 'You can only add medicines on the date of an appointment.');
        }

        $patient = Patient::findOrFail($patient_id);

        return view('doctor.patient', compact('patient', 'appointment_date'));
    }

    public function updatePatient(Request $request, $patient_id)
    {
        $request->validate([
            'morning_med' => 'nullable|string',
            'afternoon_med' => 'nullable|string',
            'night_med' => 'nullable|string',
        ]);

        $patient = Patient::findOrFail($patient_id);
        $patient->update($request->only(['morning_med', 'afternoon_med', 'night_med']));

        return redirect()->route('doctor.home')->with('success', 'Medicines updated successfully.');
    }
}