<?php

namespace App;

use App\Model\UserResumes;
use App\Model\UserSubscription;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','type','provider_id','provider',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

    public function resumes(){
        return $this->hasMany(UserResumes::class,'user_id','id')->orderByDesc('created_at');
    }
}
