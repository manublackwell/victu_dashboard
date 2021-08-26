@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">{{ $product->codice }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">PRODOTTI</a></li>
                    <li class="breadcrumb-item active">{{ $product->nome }}</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
<div class="content-body">
   <div class="content-body">
      <div class="container">
         <section class="card">
            <div id="invoice-template" class="card-body">
                <div class="container">
                    <div id="invoice-company-details" class="row">
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <div class="media">
                            <img src="{{ asset('img/logo.png') }}" alt="Victu logo" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                            <h2>{{ $product->nome }}</h2>
                        </div>
                    </div>
                    <div id="invoice-customer-details" class="row pt-4">
                        <div class="col-md-4 col-sm-12">
                            <img class="img-fluid" src="{{ env('APP_WEB_SITE').$image->path.$image->nome }}">
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 text-center text-md-left">
                                    <ul class="px-0 list-unstyled">
                                        <li><strong>Grammatura:</strong> {{ $product->grammatura }}</li>
                                        <li><strong>Kcal:</strong> {{ $product->kcal }}</li>
                                        <li><strong>Kcal (100g):</strong> {{ $product->kcal100gr }}</li>
                                        <li><strong>Carboidrati:</strong> {{ $product->carboidrati }}</li>
                                        <li><strong>di cui zuccheri:</strong> {{ $product->zuccheri }}</li>
                                        <li><strong>Proteine:</strong> {{ $product->proteine }}</li>
                                        <li><strong>Grassi:</strong> {{ $product->grassi }}</li>
                                        <li><strong>Grassi saturi:</strong> {{ $product->grassisaturi }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-12 text-center text-md-left">
                                    <ul class="px-0 list-unstyled">
                                        <li><strong>Fibre:</strong> {{ $product->fibre }}</li>
                                        <li><strong>Sodio:</strong> {{ $product->sodio }}</li>
                                        <li><strong>Sale:</strong> {{ $product->sale }}</li>
                                        <li><strong>Carico glicemico:</strong> {{ $product->caricoglicemico }}</li>
                                        <li><strong>Indice glicemico:</strong> {{ $product->indice_glicemico }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-12 text-center">
                                    <ul class="px-0 list-unstyled text-center text-md-left">
                                        <li><strong>Prezzo:</strong> {{ $product->prezzo }}</li>
                                        <li><strong>Stato:</strong> <x-product-status status="{{ $product->attivo }}"></x-product-status></li>
                                        <li><strong>Nuovo prodotto:</strong>  @if($product->nuovo == 1) Si @else No @endif</li>
                                        <li><strong>Shop front</strong> @if($product->shopfront == 1) Si @else No @endif</li>
                                        <li><strong>Ordine nello shop</strong> {{ $product->menu_order }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
</div>

</div>
@endsection
