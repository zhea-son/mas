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
        return $this->hasOne(Appointment::class);
    }

    public function paitent(){
        return $this->belongsTo(Patient::class);
    }

    public function prescription(){
        return $this->hasOne(Prescription::class);
    }
}
