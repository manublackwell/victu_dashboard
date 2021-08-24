<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMealVoucher extends Model
{
    use HasFactory;

    protected $table = 'ordini_buonipasto';
    const UPDATED_AT = null;
    const CREATED_AT = "created_at";

    public function order(){
        return $this->hasOne(Order::class);
    }
}
