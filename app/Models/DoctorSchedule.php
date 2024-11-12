<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
    protected $table = 'dr_schedule';
    protected $fillable = [
      'doctor_id', 'day', 'shift'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function appointment(){
        return $this->hasMany(Appointment::class, 'doctor_schedule_id');
    }
}
