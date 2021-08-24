<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'magazzini_hub';
    protected $fillable = ['idHub','idProdottoHub','qta','attivo'];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    const STATUS_ATTIVO = 1;
    const STATUS_NON_ATTIVO = 0;

    public function products() {
        //withPivot aggiunge i campi alla ricerca.
        return $this->belongsToMany(Product::class, 'magazzini_hub', 'idProdottoHub')->withPivot('qta', 'attivo');
    }

    public function hub() {
        return $this->belongsTo(User::class, 'idHub');
    }

    static function status_string($x){
        switch($x){
            case Product::STATUS_ATTIVO:
                return "Visibile";
            case Product::STATUS_NON_ATTIVO:
                return "Non visibile";
        }
    }
}
