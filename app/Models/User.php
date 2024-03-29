<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserType;
use App\Models\Recruiter;
use App\Models\Institution;
use App\Models\Messages;
use App\Models\Timeline;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function userType()
{
    return $this->belongsTo(UserType::class);
}

public function institution()
{
    return $this->hasOne(Institution::class);
}

public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }

    public function Message()
    {
        return $this->hasMany(Messages::class);    
    }

    
}
