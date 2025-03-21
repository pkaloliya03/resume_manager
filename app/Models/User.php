<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'age',
        'gender',
        'email',
        'password',
        'role',
        'education',
        'experience'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }
}
