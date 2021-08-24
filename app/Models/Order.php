<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ordini';
    protected $fillable = [
        'nome','cognome','email','cellulare','indirizzo_spedizione','citta_spedizione','provincia_spedizione',
        'cap_spedizione','note_spedizione','ragione_sociale','partita_iva','codice_fatturazione','indirizzo_fatturazione',
        'citta_fatturazione','provincia_fatturazione','cap_fatturazione','status'
    ];
    const UPDATED_AT = null;
    const CREATED_AT = "dataregistrazione";

    //order status const
    const STATUS_IN_ATTESA = 1;
    const STATUS_PAGAMENTO_ACCETTATO = 2;
    const STATUS_IN_ELABORAZIONE = 3;
    const STATUS_IN_SPEDIZIONE = 4;
    const STATUS_CONSEGNATO = 5;
    const STATUS_CANCELLATO = 6;
    const STATUS_RIMBORSATO = 7;
    const STATUS_ERRORE = 8;

    //plans const
    const PLAN_1 = "ESSENTIAL";
    const PLAN_2 = "REGULAR";
    const PLAN_3 = "POWER";
    const PLAN_4 = "VICTU HUB";
    const PLAN_1_SHIPPING = 11.90;
    const PLAN_2_SHIPPING = 8.90;
    const PLAN_3_SHIPPING = 0;
    const PLAN_4_SHIPPING = 0;

    const VAT_VALUE = 22;

    public function user() {
        return $this->belongsTo(User::class, 'idAccount');
    }

    public function products() {
        //withPivot aggiunge i campi alla ricerca.
        return $this->belongsToMany(Product::class, 'prodotti_ordini', 'codiceOrdine', 'idProdotto')->withPivot('quantita');
    }

    public function order_status(){
        return Order::status_string($this->status);
    }

    public function payment_method(){
        return $this->hasOne(Payment_Method::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function payment_meal_voucher(){
        return $this->belongsTo(PaymentMealVoucher::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function city(){
        return $this->hasOne(Cities::class);
    }

    public function province(){
        return $this->hasOne(Provinces::class);
    }

    public function cap(){
        return $this->hasOne(PostalCode::class);
    }

    static function status_string($x){
        switch($x){
            case Order::STATUS_IN_ATTESA:
                return "In attesa del pagamento";
            case Order::STATUS_PAGAMENTO_ACCETTATO:
                return "Pagamento accettato";
            case Order::STATUS_IN_ELABORAZIONE:
                return "In elaborazione";
            case Order::STATUS_IN_SPEDIZIONE:
                return "In spedizione";
            case Order::STATUS_CONSEGNATO:
                return "Consegnato";
            case Order::STATUS_CANCELLATO:
                return "Cancellato";
            case Order::STATUS_RIMBORSATO:
                return "Rimborsato";
            case Order::STATUS_ERRORE:
                return "Errore durante il pagamento";
        }
    }

    static function vat_price($price, $quantity){
        return (($price * Order::VAT_VALUE) / 100) * $quantity;
    }

    static function shipping_price($x){
        switch($x){
            case Order::PLAN_1:
                return Order::PLAN_1_SHIPPING;
            case Order::PLAN_2:
                return Order::PLAN_2_SHIPPING;
            default:
                return 0;
        }
    }
}
