<?php
// In app/Models/Patient.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date_of_birth', 'family_code', 'emergency_contact_number', 'relation_to_patient',
    ];
}