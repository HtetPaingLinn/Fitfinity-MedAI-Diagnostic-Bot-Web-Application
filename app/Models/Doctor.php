<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'doctoraccount';
    protected $fillable = [
        'doctor_name', 'email', 'phone', 'password', 'dept_id', 'role_id'
    ];
    protected $hidden = [
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function department(): BelongsTo
    {
        return $this -> belongsTo(Department::class);
    }
    public function role(): BelongsTo{
        return $this -> belongsTo(Role::class);
    }

    public function schedule(): HasMany {
        return $this -> hasMany(DoctorSchedule::class);
    }
}
