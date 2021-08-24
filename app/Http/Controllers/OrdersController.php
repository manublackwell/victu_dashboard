<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderUpdateRequest;
use App\Models\Cities;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Payment_method;
use App\Models\Payment;
use App\Models\Coupon;
use App\Models\PaymentMealVoucher;
use App\Models\Provinces;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $orders = Order::select('id','codice','dataregistrazione','nome','cognome','status')
            ->orderBy('dataregistrazione', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order){
        //$order = Order::where('codice', $id)->first();
        $products = Product::select('nome','prezzo','prodotti_ordini.quantita')
                        ->join('prodotti_ordini','prodotti_ordini.idProdotto','=','prodotti.id')
                        ->where('prodotti_ordini.codiceOrdine', '=' ,$order->codice)->get();
        $payment_method = Payment_method::where('id', $order->metodo_pagamento)->first();
        $payment = Payment::where('codiceOrdine', $order->codice)->first();
        $meal_voucher_payment = PaymentMealVoucher::where('codiceOrdine', $order->codice)->first();
        $coupon = Coupon::select('codice','scontonumerico','scontopercentuale')
                        ->where('id', $order->idCoupon)->first();
        $partial_order_price = OrdersController::calculate_order_products_price($products);
        $shipping_price = OrdersController::calculate_shipping_price($order);

        return view('orders.show', compact('order','products','payment_method','payment','meal_voucher_payment','coupon', 'partial_order_price', 'shipping_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order){
        $provinces = Provinces::select('sigla','provincia')->get()->toArray();

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, Order $order){

        $order->update([
            'nome' => $request->name,
            'cognome' => $request->surname,
            'email' => $request->email,
            'cellulare' => $request->phone,
            'indirizzo_spedizione' => $request->shipping_address,
            'citta_spedizione' => $request->shipping_city,
            'provincia_spedizione' => $request->shipping_province,
            'cap_spedizione' => $request->shipping_postal_code,
            'note_spedizione' => $request->shipping_note,
            'ragione_sociale' => $request->business_name,
            'partita_iva' => $request->vat_number,
            'codice_fatturazione' => $request->billing_code,
            'indirizzo_fatturazione' => $request->billing_address,
            'citta_fatturazione' => $request->billing_city,
            'provincia_fatturazione' => $request->billing_province,
            'cap_fatturazione' => $request->billing_postal_code,
            'status' => $request->order_status
        ]);

        return redirect()->route('orders.index', $order->id)->with('message', 'Ordine modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order){
        //
    }

    static function calculate_shipping_price($order){
        switch($order->piano){
            case Order::PLAN_1:
                return Order::PLAN_1_SHIPPING;
            case Order::PLAN_2:
                return Order::PLAN_2_SHIPPING;
            case Order::PLAN_3:
                return Order::PLAN_3_SHIPPING;
            case Order::PLAN_4:
                return Order::PLAN_4_SHIPPING;
        }
    }

    static function calculate_order_products_price($products){
        $partial_price = 0;
        foreach($products as $product){
            $partial_price += ($product["prezzo"] * $product["quantita"]);
        }
        return $partial_price;
    }
}
