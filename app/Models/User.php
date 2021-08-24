<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'account';
    const UPDATED_AT = null;
    const CREATED_AT = "dataregistrazione";
    const ACCOUNT_ACTIVE = 1;
    const ACCOUNT_DISABLED = 0;
    const USER_LEVEL = 1;
    const HUB_LEVEL = 3;
    const CONDITIONS_DEFAULT = 0;
    const CONDITIONS_ACCEPTED = 1;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
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

    public function order() {
        return $this->hasMany(Order::class, 'idAccount');
    }

    public function latestOrder(){
        return $this->hasOne(Order::class, 'idAccount')->latestOfMany();
    }
}
