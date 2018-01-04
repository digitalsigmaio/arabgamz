<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ani', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'downloads' => 0,
    ];

    /*
     * Check if end user exceeded download limit
     *
     * @param void
     * @return bool
     * */
    public function exceedLimit()
    {
        if ($this->downloads > 2){
            return true;
        }

        return false;
    }

}
