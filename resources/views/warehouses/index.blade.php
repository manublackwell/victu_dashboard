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
                <li class="breadcrumb-item active">MAGAZZINI
                </li>
            </ol>
        </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        <div class="btn-group">
        <a href="#" class="btn btn-round btn-primary" data-toggle="modal" data-target="#hub-product-data"><i class="ft-settings pr-1"></i> Crea magazzino</a>
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
                    <h4 class="card-title">MAGAZZINI</h4>
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

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success')}}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error')}}</div>
                        @endif

                        <table id="orders-table" class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>N. prodotti</th>
                                    <th>Azione</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hubs as $hub)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hub->email }}</td>
                                    <td>{{ $hub->nome }}</td>
                                    <td>{{ $hub->cognome }}</td>
                                    <td>{{ $hub->qta }}</td>
                                    <td>
                                        <a href="{{ route('warehouses.show', $hub->id) }}"><i class="fa fa-eye mr-1" data-toggle="tooltip" data-original-title="Visualizza prodotti magazzino"></i></a>
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

@include('modals.create-new-hub')

@endsection
