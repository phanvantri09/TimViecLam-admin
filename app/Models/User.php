<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //relationship  1 - 1
    public function info_user(){
        return $this->hasOne(InfoUser::class,'id_user');
    }
    public function info_social_user(){
        return $this->hasMany(InfoSocialUser::class, 'id_user');
    }
    //relationship  1 - n
    public function jobs(){
        return $this->hasMany(Jobs::class, 'id_user');
    }
    public function apply(){
        return $this->hasMany(Apply::class, 'id_user');
    }
}
