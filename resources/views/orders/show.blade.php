@extends('layouts.app')

@section('content')
<!-- / main menu-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">ORDINE N. {{ $order->codice }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">ORDINI</a></li>
                    <li class="breadcrumb-item active">ORDINE N. {{ $order->codice }}</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
      <!--// Creation body start-->
<div class="content-body">
   <!--// Creation card start-->
   <div class="content-body">
      <div class="container">
         <section class="card">
            <div id="invoice-template" class="card-body">
               <!-- Invoice Company Details -->
               <div class="container">
                  <div id="invoice-company-details" class="row">
                     <div class="col-md-6 col-sm-12 text-center text-md-left">
                        <div class="media">
                           <img src="{{ asset('img/logo.png') }}" alt="Victu logo" />
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12 text-center text-md-right">
                        <h2>ORDINE</h2>
                        <p class="pb-3">#{{ $order->codice }}</p>
                        <ul class="px-0 list-unstyled">
                           <li>Costo totale</li>
                           <li class="lead text-bold-800">&euro; {{ number_format((float)$order->costo, 2, '.', '') }}</li>
                        </ul>
                     </div>
                  </div>
                  <!--/ Invoice Company Details -->
                  <!-- Invoice Customer Details -->
                  <div id="invoice-customer-details" class="row pt-2">
                     <div class="col-md-6 col-sm-12 text-center text-md-left">
                        <ul class="px-0 list-unstyled">
                           <li class="text-bold-800">{{ $order->nome." ".$order->cognome }}</li>
                           <li>{{ $order->email }}</li>
                           <li>{{ $order->indirizzo_fatturazione }}</li>
                           <li>{{ $order->citta_fatturazione }}</li>
                           <li>{{ $order->provincia_fatturazione }}</li>
                           <li>{{ $order->cap_fatturazione }}</li>
                           <li>{{ $order->ragione_sociale }}</li>
                           <li>{{ $order->partita_iva }}</li>
                           <li><b>Codice fatturazione: </b>{{ $order->codice_fatturazione }}</li>
                           <li><b>Piano: </b>{{ $order->piano }}</li>
                        </ul>
                     </div>
                     <div class="col-md-6 col-sm-12 text-center text-md-right">
                        <ul class="px-0 list-unstyled text-center text-md-right">
                           <li>Data di Emissione: {{ $order->dataregistrazione }}</li>
                           <!--<li>Hub di gestione: Reggio Emilia</li>-->
                           <li class="text-bold-800"><b>Dati di spedizione</b></li>
                           <li>{{ $order->nome." ".$order->cognome }}</li>
                           <li>{{ $order->indirizzo_spedizione }},</li>
                           <li>{{ $order->citta_spedizione }},</li>
                           <li>{{ $order->provincia_spedizione }},{{ $order->cap_spedizione }}</li>
                           <li class="text-bold-800 mt-2"><b>Note sulla spedizione:</b></li>
                           <li>{{ $order->note_spedizione }}</li>
                        </ul>
                     </div>
                  </div>
                  <!--/ Invoice Customer Details -->
                  <!-- Invoice Items Details -->
                  <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prodotti & Descrizioni</th>
                                        <th class="text-right">Iva</th>
                                        <th class="text-right">Quantità</th>
                                        <th class="text-right">Totale</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                       <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $product->nome }}</td>
                                          <td class="text-right">&euro; {{ number_format((float) \App\Models\Order::vat_price($product->prezzo, $product->quantita), 2, '.', '') }}</td>
                                          <td class="text-right">{{ $product->quantita }}</td>
                                          <td class="text-right">&euro; {{ number_format((float) $product->quantita * $product->prezzo, 2, '.', '')}}</td>
                                       </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <div class="row mt-3">
                        <div class="col-md-7 col-sm-12 text-center text-md-left">
                           <p class="lead">Metodo di Pagamento:</p>
                           <div class="row">
                              <div class="col-md-8">
                                 @if(is_null($payment))
                                    <p>Nessuna transazione registrata</p>
                                 @else
                                    <table class="table table-borderless table-sm">
                                       <tbody>
                                          <tr>
                                             <td>Metodo di pagamento:</td>
                                             <td class="text-right">{{ $payment_method->metodo_pagamento }}</td>
                                          </tr>
                                          <tr>
                                             <td>Codice transazione:</td>
                                             <td class="text-right">{{ $payment->idPagamento }}</td>
                                          </tr>
                                          <tr>
                                             <td>Importo:</td>
                                             <td class="text-right">&euro; {{ number_format((float) $payment->amount / 100, 2, '.', '') }}</td>
                                          </tr>
                                          <tr>
                                             <td>Status:</td>
                                             <td class="text-right">Eseguito</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 @endif
                              </div>
                           </div>
                           <p class="lead">Buono pasto:</p>
                           <div class="row">
                              <div class="col-md-8">
                                 @if(is_null($meal_voucher_payment))
                                    <p>Nessuna transazione registrata</p>
                                 @else
                                    <table class="table table-borderless table-sm">
                                       <tbody>
                                          <tr>
                                             <td>Provider:</td>
                                             <td class="text-right"> {{ $meal_voucher_payment->provider }}</td>
                                          </tr>
                                          <tr>
                                             <td>Codice transazione:</td>
                                             <td class="text-right">{{ $meal_voucher_payment->idPagamento }}</td>
                                          </tr>
                                          <tr>
                                             <td>Importo:</td>
                                             <td class="text-right"> &euro; {{ number_format((float) $meal_voucher_payment->amount / 100, 2, '.', '') }}</td>
                                          </tr>
                                          <tr>
                                             <td>Autorizazione pagamento</td>
                                             <td class="text-right">
                                                @if($meal_voucher_payment->auth == 1)
                                                   Eseguita
                                                @else
                                                   Non Eseguita
                                                @endif
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Cattura pagamento</td>
                                             <td class="text-right">
                                                @if($meal_voucher_payment->capture == 1)
                                                   Eseguita
                                                @else
                                                   Non Eseguita
                                                @endif
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                           <p class="lead">Totale dovuto</p>
                           <div class="table-responsive">
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>Totale parziale</td>
                                       <td class="text-right">&euro; {{ number_format((float) $partial_order_price, 2, '.', '') }}</td>
                                    </tr>
                                    <!--<tr>
                                       <td>IVA (22%)</td>
                                       <td class="text-right">$ 1,788.00</td>
                                    </tr>-->
                                    <tr>
                                       <td class="text-bold-800">Spedizione</td>
                                       <td class="text-bold-800 text-right">&euro; {{ number_format((float) $shipping_price, 2, '.', '') }}</td>
                                    </tr>
                                    <tr>
                                       <td class="text-bold-800">Coupon</td>
                                       <td class="text-bold-800 text-right">
                                       @if(!is_null($coupon))
                                          @if($coupon->scontonumerico > 0 && $coupon->scontopercentuale == 0)
                                             &euro; -<x-coupon-value value="{{ $coupon->scontonumerico }}" type="{{ \App\Models\Coupon::TYPE_NUMERIC }}" order-cost="{{ $order->costo }}"></x-coupon-value>
                                          @elseif($coupon->scontonumerico == 0 && $coupon->scontopercentuale > 0)
                                             &euro; -<x-coupon-value value="{{ $coupon->scontopercentuale }}" type="{{ \App\Models\Coupon::TYPE_PERCENTAGE }}" order-cost="{{ $order->costo }}"></x-coupon-value>
                                          @else
                                             &euro; 0.00
                                          @endif
                                       @else
                                          &euro; 0.00
                                       @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-bold-800">Totale</td>
                                       <td class="text-bold-800 text-right">&euro; {{ number_format((float) $order->costo, 2, '.', '') }}</td>
                                    </tr>
                                    <tr>
                                       <td class="text-bold-800">Stato Ordine</td>
                                       <td class="text-bold-800 text-right"><x-status-order status="{{ $order->status }}"></x-status-order></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Invoice Footer -->
               <div id="invoice-footer">
                  <div class="row">
                  </div>
               </div>
               <!--/ Invoice Footer -->
            </div>
         </section>
      </div>
   </div>
</div>
</div>
<!--// Creation card finish-->
</div>
<!--// Creation body end-->

#endsection
