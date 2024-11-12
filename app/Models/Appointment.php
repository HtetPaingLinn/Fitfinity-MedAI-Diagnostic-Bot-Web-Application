<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";

    protected $fillable = [
        'patient_id',
        'schedule_id',
        'date',
        'former_symptoms'
    ];

    public function patient(){
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function schedule(){
        return $this->belongsTo(DoctorSchedule::class, 'schedule_id');
    }
}
