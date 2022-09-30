<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Jobseeker extends Authenticatable 
{
    use Notifiable;

        protected $guard = 'jobseeker';

        protected $fillable = [
             'id','fname','email', 'password','last_login',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function skills() {
        return $this->hasMany(JsSkill::class, 'js_userid');
    }
}
