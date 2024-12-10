<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $table = 'roster'; // Specify the table name

    protected $primaryKey = 'roster_id'; // Specify the primary key

protected $fillable = [
    'supervisor_name',
    'doctor_name',
    'doctor_id',
    'caregiver_1_name',
    'caregiver_1_patient_group',
    'caregiver_2_name',
    'caregiver_2_patient_group',
    'caregiver3_name',
    'patient_group3',
    'caregiver4_name',
    'patient_group4',
    'date',
    'patient_id',
    'patient_2_id',
    'patient_3_id',
];

    public function patients()
    {
        // Define the relationship with the Patient model
        return $this->belongsToMany(Patient::class, 'roster_patient', 'roster_id', 'patient_id');
    }
}