<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    const TYPE_PERCENTAGE = "PERCENTAGE";
    const TYPE_NUMERIC = "NUMERIC";

    const NO_BOX = 0;
    const BOX_4 = 1;
    const BOX_8 = 2;
    const BOX_12 = 3;
    const BOX_16 = 4;
    const BOX_32 = 5;
    const BOX_64 = 6;


    public function order(){
        return $this->hasMany(Order::class, 'idCoupon');
    }

    static function boxes($box){
        switch($box){
            case Coupon::NO_BOX:
                return "Nessun box";
            case Coupon::BOX_4:
                return "Essential (Box 4)";
            case Coupon::BOX_8:
                return "Regular (Box 8)";
            case Coupon::BOX_12:
                return "Power (Box 12)";
            case Coupon::BOX_16:
                return "Performance (Box 16)";
            case Coupon::BOX_32:
                return "Extra (Box 32)";
            case Coupon::BOX_64:
                return "Max (Box 64)";
        }
    }
}
