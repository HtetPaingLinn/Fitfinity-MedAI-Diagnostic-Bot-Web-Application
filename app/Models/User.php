<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'user_account';
    protected $fillable = [
        'username', 'email', 'phone', 'date_of_birth', 'password',
        'weight', 'height', 'gender', 'blood', 'NRC','photo'
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
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function medical_record(){
        return $this->hasMany(Medical_record::class);
    }

    public function getProfilePhotoAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return asset('storage/app/public/images/default-profile.jpg');
    }
}
