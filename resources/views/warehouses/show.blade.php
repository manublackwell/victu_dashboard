@extends('layouts.app')

@section('content')
<!-- / main menu-->
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">MAGAZZINI</h3>
        <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">MAGAZZINO {{ $warehouse->id }}
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
                        <h4 class="card-title">MAGAZZINO {{ $warehouse->id }}</h4>
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
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success')}}</div>
                        @endif
                        <table id="orders-table" class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome prodotto</th>
                                    <th>Quantit&aacute;</th>
                                    <th>Status</th>
                                    <th>Azione</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nome }}</td>
                                    <td>{{ $product->qta }}</td>
                                    <td><x-warehouse-product-status status="{{ $product->attivo }}"></x-warehouse-product-status></td>
                                    <td>
                                        <a href="#" data-hub="{{ $warehouse->id }}" data-product="{{ $product->id }}" data-quantity="{{ $product->qta }}" data-toggle="modal" data-target="#hub-product-data"><i class="fa fa-pencil mr-1" data-toggle="tooltip" data-original-title="Modifica quantità prodotto"></i></a>
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

@include('modals.hub-product-data')

@endsection
