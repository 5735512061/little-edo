<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminAsst extends Authenticatable
{
	use Notifiable;
	
    protected $table = 'adminassts';

    protected $guard = 'adminAsst';

    protected $fillable = [
        'adminAsst_name','password',
    ];
    protected $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
