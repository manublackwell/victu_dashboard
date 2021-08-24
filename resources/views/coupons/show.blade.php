@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">COUPON {{ $coupon->codice }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('coupons.index') }}">COUPONS</a></li>
                    <li class="breadcrumb-item active">COUPON N. {{ $coupon->codice }}</li>
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
                            <h2>COUPON</h2>
                            <p class="pb-3">#{{ $coupon->codice }}</p>
                            <ul class="px-0 list-unstyled">
                            <li class="lead text-bold-800">
                                    @if($coupon->scontonumerico != 0 && $coupon->scontopercentuale == 0)
                                        &euro; {{ number_format((float)$coupon->scontonumerico, 2, '.', '') }}
                                    @elseif($coupon->scontonumerico == 0 && $coupon->scontopercentuale != 0)
                                        {{ number_format((float)$coupon->scontopercentuale, 2, '.', '') }}%
                                    @else
                                        &euro; {{ number_format((float) 0, 2, '.', '') }}
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <ul class="px-0 list-unstyled">
                                <li><strong>Data di partenza:</strong> {{ $coupon->datainizio }}</li>
                                <li><strong>Data fine:</strong> {{ $coupon->datafine }}</li>
                                <li><strong>Disponibilità:</strong> {{ $coupon->qta }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                            <ul class="px-0 list-unstyled text-center text-md-right">
                                <li><strong>Utilizzabile da:</strong> <x-coupon-boxes box="{{ $coupon->idbox }}"></x-coupon-boxes></li>
                                <li><strong>Multiuse:</strong> @if($coupon->multiuse == 1) Si @else No @endif</li>
                                <li><strong>Utilizzo buono pasto:</strong> @if($coupon->buono_pasto == 1) Si @else No @endif</li>
                            </ul>
                        </div>
                    </div>
                    <div id="orders-coupon" class="row pt-2">
                        <table id="orders-table" class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Codice ordine</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->codice }}</td>
                                    <td>{{ $order->nome." ".$order->cognome }}</td>
                                    <td><x-status-order status="{{ $order->status }}"></x-status-order></td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}"><i class="fa fa-eye mr-1" data-toggle="tooltip" data-original-title="Visualizza ordine"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
