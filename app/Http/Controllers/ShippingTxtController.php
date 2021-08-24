<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShippingTxtController extends Controller
{   
    const SENDER_COMPANY_NAME = "Fuse srl";
    const SENDER_ADDRESS = "Via San francesco 18/3";
    const SENDER_CITY = "Quattro Castella";
    const SENDER_POSTAL_CODE = "42020";
    const SENDER_PROVINCE = "RE";
    const SENDER_NATION = "IT";
    
    const SHIPPING_NATION = "IT";
    
    const COMPANY_NAME_LOADED = "Gran Caffe Roma";
    const LOAD_ADDRESS = "via Roma 31";
    const LOAD_CITY = "Sant Ilario d Enza";
    const LOAD_POSTAL_CODE = "42049";
    const LOAD_PROVINCE = "RE";
    const LOAD_NATION = "IT";


    public function getDownload(Request $request){

        $validated = $request->validate([
            'shipping_date' => 'required|after_or_equal:date',
            'order_code' => 'required'
        ]);

        /* VARIABILI ARRAY */
            $array137 = array_fill(0, 137, ' ');
            $array128 = array_fill(0, 128, ' ');
            $array36 = array_fill(0, 36, ' ');
            $array16 = array_fill(0, 16, ' ');
            $array9 = array_fill(0, 9, ' ');
            $array8 = array_fill(0, 8, ' ');
            $array6 = array_fill(0, 6, ' ');
            $array6_zero = array_fill(0, 6, '0');
            $array2 = array_fill(0, 2, ' ');

        $id = $request->order_code;
        $data = str_replace('-', "", $request->shipping_date);
        
        $order = Order::where('codice', $id)->first();
        $products_number = Product::select('prodotti_ordini.quantita')
                        ->join('prodotti_ordini','prodotti_ordini.idProdotto','=','prodotti.id')
                        ->where('prodotti_ordini.codiceOrdine', '=' ,$id)->sum('quantita');
        
        $ragionesocialemittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_COMPANY_NAME), $array36), 0, 36);
        $indirizzomittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_ADDRESS), $array36), 0, 36);
        $localitamittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_CITY), $array36), 0, 36);
        $capmittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_POSTAL_CODE), $array9), 0, 9);
        $provinciamittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_PROVINCE), $array2), 0, 2);
        $nazionemittente = array_slice(array_merge(str_split(ShippingTxTController::SENDER_NATION), $array2), 0, 2);

        
        //dati ordine
        $date = array_slice(array_merge(str_split($data), $array8), 0, 8);
        $codice2 = array_slice(array_merge(str_split($order->codice), $array16), 0, 16);
        
        $ragionesocialecarico = array_slice(array_merge(str_split(ShippingTxTController::COMPANY_NAME_LOADED), $array36), 0, 36);
        $indirizzocarico = array_slice(array_merge(str_split(ShippingTxTController::LOAD_ADDRESS), $array36), 0, 36);
        $localitacarico = array_slice(array_merge(str_split(ShippingTxTController::LOAD_CITY), $array36), 0, 36);
        $capcarico = array_slice(array_merge(str_split(ShippingTxTController::LOAD_POSTAL_CODE), $array36), 0, 9);
        $provinciacarico = array_slice(array_merge(str_split(ShippingTxTController::LOAD_PROVINCE), $array2), 0, 2);
        $nazionecarico = array_slice(array_merge(str_split(ShippingTxTController::LOAD_NATION), $array2), 0, 2);
        
        $ragionesocialespedizione = array_slice(array_merge(str_split($order->nome." ".$order->cognome), $array36), 0, 36);
        $indirizzospedizione = array_slice(array_merge(str_split($order->citta_spedizione), $array36), 0, 36);
        $localitaspedizione = array_slice(array_merge(str_split($order->citta_spedizione), $array36), 0, 36);
        $capspedizione = array_slice(array_merge(str_split($order->cap_spedizione), $array9), 0, 9);
        $provinciaspedizione = array_slice(array_merge(str_split($order->provincia_spedizione), $array2), 0, 2);
        $nazionespedizione = array_slice(array_merge(str_split(ShippingTxtController::SHIPPING_NATION), $array2), 0, 2);
        
        $npezzi = array_reverse(array_slice(array_merge(str_split($products_number), $array6_zero), 0, 6));
        $pesolordo = array_reverse(array_slice(array_merge(str_split($this->calculate_weight($products_number)), $array6_zero), 0, 6));
        $ncolli = array_reverse(array_slice(array_merge(str_split($this->calculate_colli_number($products_number)), $array6_zero), 0, 6));
        $email = array_slice(array_merge(str_split($order->email), $array128), 0, 128);
        if(empty($order->note_spedizione)){
            $commentospedizione =  array_fill(0, 128, ' ');
        }else{
            $commentospedizione = array_slice(array_merge(str_split($order->note_spedizione), $array128), 0, 128);
        }

        $content = "T";
        //codice 16 chars
        foreach($codice2 as $row){
            $content .= $row;
        }
        //date 8 chars
        foreach($date as $row){
            $content .= $row;
        }
        //date 8 chars
        $content.="        ";
        //codice 16 chars
        foreach($codice2 as $row){
            $content .= $row;
        }
        //codice mittente 16 chars
        $content .="                ";
        //ragionesociale 36 chars
        foreach($ragionesocialemittente as $row){
            $content .= $row;
        }
        //indirizzo 36 chars
        foreach($indirizzomittente as $row){
            $content .= $row;
        }
        //località 36 chars
        foreach($localitamittente as $row){
            $content .= $row;
        }
        //cap 9 chars
        foreach($capmittente as $row){
            $content .= $row;
        }
        //provincia 2 chars
        foreach($provinciamittente as $row){
            $content .= $row;
        }
        //nazione 2 chars
        foreach($nazionemittente as $row){
            $content .= $row;
        }
        
        // 16 Codice esterno carico merce
        $content .="                ";
        
        foreach($ragionesocialecarico as $row){
            $content .= $row;
        }
        
        foreach($indirizzocarico as $row){
            $content .= $row;
        }
        
        foreach($localitacarico as $row){
            $content .= $row;
        }
        
        foreach($capcarico as $row){
            $content .= $row;
        }
        
        foreach($provinciacarico as $row){
            $content .= $row;
        }
        
        foreach($nazionecarico as $row){
            $content .= $row;
        }
        
        // 16 Codice esterno destinatario
        $content .="                ";
        
        //ragionesociale 36 chars
        foreach($ragionesocialespedizione as $row){
            $content .= $row;
        }
        
        //indirizzo 36 chars
        foreach($indirizzospedizione as $row){
            $content .= $row;
        }
        
        //localita 36 chars
        foreach($localitaspedizione as $row){
            $content .= $row;
        }
        
        //cap 9 chars
        foreach($capspedizione as $row){
            $content .= $row;
        }
        
        //provincia 2 chars
        foreach($provinciaspedizione as $row){
            $content .= $row;
        }
        
        //provincia 2 chars
        foreach($nazionespedizione as $row){
            $content .= $row;
        }
        
        //codice e ragione sociale luogo scarico merce (VUOTO)
        foreach($array137 as $row){
            $content .= $row;
        }

        foreach($ncolli as $row){
            $content .= $row;
        }

        foreach($pesolordo as $row){
            $content .= $row;
        }
        
        foreach($npezzi as $row){
            $content .= $row;
        }
        //numero bancali, qta complementare, UM qta compl, importo contrassegno, valuta contrassegno, rimborso, data e ore consegna richiesta
        $content .= "000000000000   0000000000EURES000000000000";
        
        foreach($commentospedizione as $row){
            $content .= $row;
        }
        
        //dal 46 al 89
        $content .= "     FR    HD  PP                                 0000                            0000                       000000000000000000000000000000                                                                                                                                                            00000000                                   00000000                                                                                                                                                                                               00000000";
        
        foreach($email as $row){
            $content .= $row;
        }

        return response($content)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="order_'.$order->codice.'.txt',
        ]);
    }

    static function calculate_weight($x){
        if($x >= 4 && $x <= 6){
            return 2;
        }else if($x >= 7 && $x <= 9){
            return 3;
        }else if($x >= 10 && $x <= 14){
            return 4;
        }else if($x >= 15 && $x <= 18){
            return 5;
        }else{
            return 6;
        }
    }

    static function calculate_colli_number($x){
        if($x >= 4 && $x <= 9){
            return 1;
        }else if($x >= 10 && $x <= 18){
            return 2;
        }else{
            return 3;
        }
    }
}
