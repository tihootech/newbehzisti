<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'type', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'access'
    ];

    public function getAccessAttribute()
    {
        if ($this->type == 'master') {
            return 'مدیرکل';
        }
        if ($this->type == 'expert') {
            return 'کارشناس اشتغال شهرستان';
        }
        if ($this->type == 'organ') {
            return 'کارفرما';
        }
        if ($this->type == 'user') {
            return 'مددجو';
        }
    }
}
