<?php

namespace App\Models;

use App\Models\Schedule;
use App\Models\Department;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }

    public function specialization(){
        return $this->belongsTo(Specialization::class);
    }

    protected function status(): Attribute{
        return new Attribute(
            get: fn($value) => ["full-time","part-time","guest"][$value],
        );
    }
}
