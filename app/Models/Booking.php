<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function prescription(){
        return $this->hasOne(Prescription::class);
    }
}
