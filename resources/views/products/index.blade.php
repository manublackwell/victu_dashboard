@extends('layouts.app')

@section('content')
<!-- / main menu-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">PRODOTTI</h3>
        <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">PRODOTTI
                </li>
            </ol>
        </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        <div class="btn-group">
        <a href="{{ route('products.create') }}" class="btn btn-round btn-primary" type="button"><i class="ft-settings pr-1"></i> Aggiungi Prodotto</a>
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
                    <h4 class="card-title">PRODOTTI</h4>
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
                        <table id="orders-table" class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Grammatura</th>
                                    <th>Kcal</th>
                                    <th>Prezzo</th>
                                    <th>Stato</th>
                                    <th>Azione</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nome }}</td>
                                    <td>{{ $product->grammatura."g" }}</td>
                                    <td>{{ number_format((float) $product->kcal, 2, '.', '') }}</td>
                                    <td>&euro; {{ number_format((float) $product->prezzo, 2, '.', '') }}</td>
                                    <td><x-product-status status="{{ $product->attivo }}"></x-product-status></td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye mr-1" data-toggle="tooltip" data-original-title="Visualizza dati prodotto"></i>
                                        <a href="{{ route('products.edit', $product->id) }}"><i class="fa fa-pencil mr-1" data-toggle="tooltip" data-original-title="Modifica dati prodotto"></i></a>
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
