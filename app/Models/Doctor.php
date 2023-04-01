<?php

namespace App\Models;

use App\Notifications\DoctorResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'nid',
        'dob',
        'reg_no',
        'password',
        'status',
        'is_visible',
        'latlong',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new DoctorResetPasswordNotification($token));
    }
}
