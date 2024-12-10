<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Appointment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the patient's home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patientHome()
    {
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->firstOrFail();
        $currentDate = Carbon::now()->toDateString();

        $upcomingAppointments = Appointment::where('patient_id', $patient->patient_id)
            ->where('appointment_date', '>=', $currentDate)
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('patient.home', compact('patient', 'currentDate', 'upcomingAppointments'));
    }

    /**
     * Show the family home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function familyHome()
    {
        return view('family.home');
    }

    /**
     * Show the patient's information based on the entered ID and family code.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showFamilyPatient(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'family_code' => 'required|string',
        ]);

        $patient = Patient::where('patient_id', $request->patient_id)
            ->where('family_code', $request->family_code)
            ->firstOrFail();

        $currentDate = Carbon::now()->toDateString();

        $upcomingAppointments = Appointment::where('patient_id', $patient->patient_id)
            ->where('appointment_date', '>=', $currentDate)
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('family.show', compact('patient', 'currentDate', 'upcomingAppointments'));
    }
}