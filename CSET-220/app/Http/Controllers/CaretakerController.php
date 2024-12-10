<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Patient;

class CaretakerController extends Controller
{
    public function home(Request $request)
    {
        $date = $request->query('date', now()->toDateString());
        $roster = Roster::where('date', $date)->first();

        $patients = collect();
        if ($roster) {
            $patients = Patient::whereIn('patient_id', [
                $roster->patient_id,
                $roster->patient_2_id,
                $roster->patient_3_id
            ])->get();
        }

        return view('caretaker.home', compact('patients', 'date'));
    }

    public function viewPatient($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        return view('caretaker.patient', compact('patient'));
    }

    public function updateLogs(Request $request, $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);

        $patient->update([
            'morning_med_given' => $request->has('morning_med_given'),
            'morning_med_time' => $request->has('morning_med_given') ? now() : null,
            'afternoon_med_given' => $request->has('afternoon_med_given'),
            'afternoon_med_time' => $request->has('afternoon_med_given') ? now() : null,
            'night_med_given' => $request->has('night_med_given'),
            'night_med_time' => $request->has('night_med_given') ? now() : null,
            'food_given' => $request->has('food_given'),
            'food_time' => $request->has('food_given') ? now() : null,
        ]);

        return redirect()->route('caretaker.patient', ['patient_id' => $patient_id])->with('success', 'Logs updated successfully!');
    }
}