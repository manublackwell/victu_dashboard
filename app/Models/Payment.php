<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'ordini_pagamenti';
    const UPDATED_AT = null;
    const CREATED_AT = "dataregistrazione";

    const UPDAY = "Upday";
    const EDENRED = "Ticket Restaurant";

    public function order(){
        return $this->hasOne(Order::class);
    }
}
