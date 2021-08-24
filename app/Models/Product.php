<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'prodotti';
    protected $fillable = ['nome', 'descrizione','grammatura','suggerimenti','kcal','kcal100gr','kj','carboidrati','proteine','zuccheri','grassi',
                            'grassisaturi','fibre','sodio','allergeni','ingredienti','caricoglicemico','prezzo','qta','attivo','sale','nuovo','shopfront',
                            'indice_glicemico','menu_order'];
    public $timestamps = false;

    const STATUS_ATTIVO = 1;
    const STATUS_NON_ATTIVO = 0;

    public function order() {
        return $this->belongsToMany(Order::class, 'prodotti_ordini', 'idProdotto', 'codiceOrdine')->withPivot('quantita');
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
