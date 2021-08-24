<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;
    protected $table = 'italy_cap';
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function order(){
        return $this->hasMany(Order::class);
    }
}
