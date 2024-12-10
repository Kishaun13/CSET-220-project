<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Specify the custom primary key
    protected $primaryKey = 'patient_id';

    // Specify if the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the type of the primary key
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'morning_med',
        'afternoon_med',
        'night_med',
        'morning_med_given',
        'morning_med_time',
        'afternoon_med_given',
        'afternoon_med_time',
        'night_med_given',
        'night_med_time',
        'food_given',
        'food_time',
    ];

    public function appointments()
    {
        // Define the relationship correctly
        return $this->hasMany(Appointment::class, 'patient_id', 'patient_id');
    }

    public function rosters()
    {
        // Define the relationship with the Roster model
        return $this->belongsToMany(Roster::class, 'roster_patient', 'patient_id', 'roster_id');
    }
}