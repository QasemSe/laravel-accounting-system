<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class Manager extends Authenticatable
{
    use LaratrustUserTrait, HasApiTokens, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAvatarPath()
    {
        return 'assets/dashboard/media/users/' . $this->image;
    }

}
