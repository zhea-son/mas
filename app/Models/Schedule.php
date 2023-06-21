<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
