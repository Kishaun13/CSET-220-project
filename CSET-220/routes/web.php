<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Admin\RosterController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CaretakerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/available-rosters', [RosterController::class, 'availableRosters'])->name('available.rosters');

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/patient/home', [HomeController::class, 'patientHome'])->name('patient.home');
    Route::get('/doctor/home', [DoctorController::class, 'home'])->name('doctor.home');
    Route::get('/doctor/patient/{patient_id}', [DoctorController::class, 'patient'])->name('doctor.patient');
    Route::post('/doctor/patient/{patient_id}', [DoctorController::class, 'updatePatient'])->name('doctor.updatePatient');
    Route::get('/family/home', [HomeController::class, 'familyHome'])->name('family.home');
    Route::post('/family/home', [HomeController::class, 'showFamilyPatient'])->name('family.showPatient');
    Route::get('/caretaker/home', [CaretakerController::class, 'home'])->name('caretaker.home');
    Route::get('/caretaker/patient/{patient_id}', [CaretakerController::class, 'viewPatient'])->name('caretaker.patient');
    Route::post('/caretaker/patient/{patient_id}/update-logs', [CaretakerController::class, 'updateLogs'])->name('caretaker.updateLogs');
    Route::post('/caretaker/patient/{patient_id}', [CaretakerController::class, 'updatePatient'])->name('caretaker.updatePatient');
});

Route::middleware(['Admin'])->group(function () {
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{user}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::get('/admin/employees', [EmployeesController::class, 'showEmployees'])->name('admin.employees.index');
    Route::post('/admin/employees/{employee}', [EmployeesController::class, 'updateEmployee'])->name('admin.employees.update');
    Route::get('/admin/patients', [PatientsController::class, 'showPatients'])->name('admin.showPatients');
    Route::post('/admin/patients', [PatientsController::class, 'getPatient'])->name('admin.getPatient');
    Route::get('/admin/rosters/create', [RosterController::class, 'create'])->name('admin.rosters.create');
    Route::post('/admin/rosters', [RosterController::class, 'store'])->name('admin.rosters.store');
    Route::get('/admin/rosters', [RosterController::class, 'index'])->name('admin.rosters.index');
    Route::delete('/admin/rosters/{roster}', [RosterController::class, 'destroy'])->name('admin.rosters.destroy');
    Route::get('/admin/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
    Route::get('/admin/appointments/doctors', [AppointmentController::class, 'getDoctors'])->name('admin.appointments.doctors');
    Route::post('/admin/appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');
});

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');