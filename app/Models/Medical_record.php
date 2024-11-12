<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_record extends Model
{
    use HasFactory;
    protected $table = 'medical_record';

    protected $fillable = [
        'appointment_id',
        'allergies',
        'surgery_history',
        'past_med_history',
        'current_disease',
        'family_history',
        'medications',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
