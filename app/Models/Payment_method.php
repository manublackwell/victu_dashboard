<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    use HasFactory;
    protected $table = 'metodi_pagamento';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function payment_method(){
        return $this->hasOne(Order::class);
    }
}
