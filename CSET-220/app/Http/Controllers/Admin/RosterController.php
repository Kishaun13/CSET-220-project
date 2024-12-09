<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;

class RosterController extends Controller
{
    public function create()
    {
        return view('admin.rosters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supervisor_name' => 'required|string|max:100',
            'doctor_name' => 'required|string|max:100',
            'caregiver_1_name' => 'required|string|max:100',
            'caregiver_1_patient_group' => 'nullable|string|max:255',
            'caregiver_2_name' => 'nullable|string|max:100',
            'caregiver_2_patient_group' => 'nullable|string|max:255',
            'caregiver3_name' => 'nullable|string|max:100',
            'patient_group3' => 'nullable|string',
            'caregiver4_name' => 'nullable|string|max:100',
            'patient_group4' => 'nullable|string',
            'date' => 'nullable|date',
        ]);

        Roster::create($request->all());

        return redirect()->route('admin.rosters.create')->with('success', 'Roster created successfully.');
    }

    public function index()
    {
        $rosters = Roster::all();
        return view('admin.rosters.index', compact('rosters'));
    }

    public function destroy($roster_id)
    {
        $roster = Roster::findOrFail($roster_id);
        $roster->delete();

        return redirect()->route('admin.rosters.index')->with('success', 'Roster deleted successfully.');
    }
}