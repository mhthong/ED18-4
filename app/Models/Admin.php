<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
    use Notifiable;



protected $guard = 'admin';

protected $fillable = [
    'name', 'email', 'password','last_login','last_name','avarta_id'
];

protected $hidden = [
    'password', 'remember_token',
];

public function getAuthPassword()
{
    return $this->password;
}


}

