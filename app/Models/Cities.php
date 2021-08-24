<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'italy_cities';
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function order(){
        return $this->hasMany(Order::class);
    }
}
