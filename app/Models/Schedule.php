<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'schedule_id');
    }
}
