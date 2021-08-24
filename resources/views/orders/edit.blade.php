@extends('layouts.app')

@section('content')
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
   <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">MODIFICA ORDINE {{ $order->codice }}</h3>
      <div class="row breadcrumbs-top">
         <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
               <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">ORDINE<a></a></li>
               <li class="breadcrumb-item active">{{ $order->codice }}</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!--// Creation body start-->
<div class="content-body">
<!--// Creation card && form start-->
<section id="horizontal-form-layouts">
   <div class="row mt-2">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title" id="horz-layout-colored-controls">MODIFICA DATI ORDINE {{ $order->codice }}</h4>
               <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
               <div class="heading-elements">
                  <ul class="list-inline mb-0">
                     <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                     <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                     <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="card-content collpase show">
               <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{ route('orders.update', $order->id) }}">
                    @method('PUT')
                    @csrf
                     <div class="form-body">
                        <h4 class="form-section"><i class="fa fa-eye"></i>DATI ORDINE</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                    <label class="col-md-3 label-control" for="name">Nome</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" class="form-control border-primary @error('name') is-invalid @enderror" placeholder="Nome" name="name" value="{{ $order->nome }}">
                                        @error('name')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                              </div>
                           </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="surname">Cognome</label>
                                    <div class="col-md-9">
                                        <input type="text" id="surname" class="form-control border-primary @error('surname') is-invalid @enderror" placeholder="Cognome" name="surname" value="{{ $order->cognome }}">
                                        @error('surname')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="email">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email" class="form-control border-primary @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $order->email }}">
                                        @error('email')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="phone">Cellulare</label>
                                    <div class="col-md-9">
                                        <input type="number" id="phone" class="form-control border-primary @error('phone') is-invalid @enderror" placeholder="Cellulare" name="phone" value="{{ $order->cellulare }}">
                                        @error('phone')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="form-section"><i class="fa fa-eye"></i>DATI SPEDIZIONE</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="indirizzo_spedizione">Indirizzo spedizione</label>
                                    <div class="col-md-9">
                                        <input type="text" id="indirizzo_spedizione" class="form-control border-primary @error('shipping_address') is-invalid @enderror" placeholder="Indirizzo spedizione" name="shipping_address" value="{{ $order->indirizzo_spedizione }}">
                                        @error('shipping_address')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="citta_spedizione">Citt&aacute; spedizione</label>
                                    <div class="col-md-9">
                                        <select id="citta_spedizione" class="form-control border-primary @error('shipping_city') is-invalid @enderror" name="shipping_city">
                                            <option value="{{ $order->citta_spedizione }}">{{ $order->citta_spedizione }}</option>
                                        </select>
                                        @error('shipping_city')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="provincia_spedizione">Provincia spedizione</label>
                                    <div class="col-md-9">
                                        <select id="provincia_spedizione" class="form-control border-primary @error('shipping_province') is-invalid @enderror" name="shipping_province">
                                            <option value="{{ $order->provincia_spedizione }}">{{ $order->provincia_spedizione }}</option>
                                        </select>
                                        @error('shipping_province')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="cap_spedizione">Cap spedizione</label>
                                    <div class="col-md-9">
                                        <input type="number" id="cap_spedizione" class="form-control border-primary @error('shipping_postal_code') is-invalid @enderror" placeholder="Cap spedizione" name="shipping_postal_code" value="{{ $order->cap_spedizione }}">
                                        @error('shipping_postal_code')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="note_spedizione">Note spedizione</label>
                                    <div class="col-md-9">
                                        <textarea id="note_spedizione" rows="5" class="form-control border-primary @error('shipping_note') is-invalid @enderror" name="shipping_note" placeholder="Note spedizione">{{ $order->note_spedizione }}</textarea>
                                        @error('shipping_note')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="form-section"><i class="fa fa-eye"></i>DATI FATTURAZIONE</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="ragione_sociale">Ragione sociale</label>
                                    <div class="col-md-9">
                                        <input type="text" id="ragione_sociale" class="form-control border-primary @error('business_name') is-invalid @enderror"  placeholder="Ragione sociale" name="business_name" value="{{ $order->ragione_sociale }}">
                                        @error('business_name')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="partita_iva">Partita IVA</label>
                                    <div class="col-md-9">
                                        <input type="text" id="partita_iva" class="form-control border-primary @error('vat_number') is-invalid @enderror" placeholder="Partita IVA" name="vat_number" value="{{ $order->vat_number }}">
                                        @error('vat_number')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="codice_fatturazione">Codice fatturazione</label>
                                    <div class="col-md-9">
                                        <input type="text" id="codice_fatturazione" class="form-control border-primary @error('billing_code') is-invalid @enderror" placeholder="Codice fatturazione" name="billing_code" value="{{ $order->codice_fatturazione }}">
                                        @error('billing_code')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="indirizzo_fatturazione">Indirizzo fatturazione</label>
                                    <div class="col-md-9">
                                        <input type="text" id="indirizzo_fatturazione" class="form-control border-primary @error('billing_address') is-invalid @enderror" placeholder="Indirizzo fatturazione" name="billing_address" value="{{ $order->codice_fatturazione }}">
                                        @error('billing_address')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="citta_fatturazione">Citt&aacute; fatturazione</label>
                                    <div class="col-md-9">
                                        <select id="citta_fatturazione" class="form-control border-primary @error('billing_city') is-invalid @enderror" name="billing_city">
                                            <option value="{{ $order->citta_fatturazione }}">{{ $order->citta_fatturazione }}</option>
                                        </select>
                                        @error('billing_city')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="provincia_fatturazione">Provincia fatturazione</label>
                                    <div class="col-md-9">
                                        <select id="provincia_fatturazione" class="form-control border-primary @error('billing_province') is-invalid @enderror" name="billing_province">
                                            <option value="{{ $order->provincia_fatturazione }}">{{ $order->provincia_fatturazione }}</option>
                                        </select>
                                        @error('billing_province')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="cap_fatturazione">Cap fatturazione</label>
                                    <div class="col-md-9">
                                        <input type="number" id="cap_fatturazione" class="form-control border-primary @error('billing_postal_code') is-invalid @enderror" placeholder="Cap fatturazione" name="billing_postal_code" value="{{ $order->cap_fatturazione }}">
                                        @error('billing_postal_code')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                           </div>
                        </div>
                        <h4 class="form-section"><i class="fa fa-eye"></i>ALTRO</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="stato_ordine">Stato ordine</label>
                                    <div class="col-md-9">
                                        <select id="stato_ordine" class="form-control border-primary @error('order_status') is-invalid @enderror" name="order_status">
                                            <option value="{{ \App\Models\Order::STATUS_IN_ATTESA }}" {{ $order->status == \App\Models\Order::STATUS_IN_ATTESA ? "selected" : "" }}>In attesa del pagamento</option>
                                            <option value="{{ \App\Models\Order::STATUS_PAGAMENTO_ACCETTATO }}" {{ $order->status == \App\Models\Order::STATUS_PAGAMENTO_ACCETTATO ? "selected" : "" }}>Pagamento accettato</option>
                                            <option value="{{ \App\Models\Order::STATUS_IN_ELABORAZIONE }}" {{ $order->status == \App\Models\Order::STATUS_IN_ELABORAZIONE ? "selected" : "" }}>In elaborazione</option>
                                            <option value="{{ \App\Models\Order::STATUS_IN_SPEDIZIONE }}" {{ $order->status == \App\Models\Order::STATUS_IN_SPEDIZIONE ? "selected" : "" }}>In spedizione</option>
                                            <option value="{{ \App\Models\Order::STATUS_CONSEGNATO }}" {{ $order->status == \App\Models\Order::STATUS_CONSEGNATO ? "selected" : "" }}>Consegnato</option>
                                            <option value="{{ \App\Models\Order::STATUS_CANCELLATO }}" {{ $order->status == \App\Models\Order::STATUS_CANCELLATO ? "selected" : "" }}>Cancellato</option>
                                            <option value="{{ \App\Models\Order::STATUS_RIMBORSATO }}" {{ $order->status == \App\Models\Order::STATUS_RIMBORSATO ? "selected" : "" }}>Rimborsato</option>
                                            <option value="{{ \App\Models\Order::STATUS_ERRORE }}" {{ $order->status == \App\Models\Order::STATUS_ERRORE ? "selected" : "" }}>Errore durante il pagamento</option>
                                        </select>
                                        @error('order_status')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-warning mr-1"><i class="ft-x"></i> Indietro</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Modifica</button>
                        </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
<!-- // Basic form layout section end -->
<!--// Creation card && form end-->
</div>
@endsection
