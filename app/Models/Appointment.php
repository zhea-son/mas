<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function booking(){
        return $this->hasOne(Booking::class);
    }
}
