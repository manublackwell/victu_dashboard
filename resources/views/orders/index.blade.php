@extends('layouts.app')

@section('content')
<!-- / main menu-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">ORDINI</h3>
        <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">ORDINI
                </li>
            </ol>
        </div>
        </div>
    </div>
</div>
<!--// Creation body start-->
<div class="content-body">
    <!--Create data table start-->
    <div class="content-body">
        <section id="multi-column">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">ORDINI</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                    </div>
                    <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table id="orders-table" class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Codice</th>
                                    <th>Intestatario</th>
                                    <th>Status</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->dataregistrazione }}</td>
                                    <td>{{ $order->codice }}</td>
                                    <td>{{ $order->nome." ".$order->cognome }}</td>
                                    <td><x-status-order status="{{ $order->status }}"></x-status-order></td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}"><i class="fa fa-eye mr-1" data-toggle="tooltip" data-original-title="Visualizza ordine"></i>
                                        <a href="{{ route('orders.edit', $order->id) }}"><i class="fa fa-pencil mr-1" data-toggle="tooltip" data-original-title="Modifica ordine"></i></a>
                                        <a href="#" data-code="{{ $order->codice }}" data-toggle="modal" data-target="#shipping-txt-data"><i class="fa fa-file-text-o mr-1" data-toggle="tooltip" data-original-title="Crea file spedizione"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
    <!--Create data table end-->
</div>
<!--// Creation body end-->

@include('modals.shipping-txt-modal')

@endsection

