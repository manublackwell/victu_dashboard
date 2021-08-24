@extends('layouts.app')

@section('content')

<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">COUPONS</h3>
        <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">COUPONS
                </li>
            </ol>
        </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        <div class="btn-group">
        <a href="{{ route('coupons.create') }}" class="btn btn-round btn-primary" type="button"><i class="ft-settings pr-1"></i> Nuovo coupon</a>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="content-body">
        <section id="multi-column">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">COUPONS</h4>
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
                                    <th>Codice</th>
                                    <th>Sconto</th>
                                    <th>Periodo</th>
                                    <th>Quantità</th>
                                    <th>Utilizzabile da</th>
                                    <th>Dettagli</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $coupon->codice }}</td>
                                    <td>
                                        @if($coupon->scontonumerico != 0 && $coupon->scontopercentuale == 0)
                                            {{ $coupon->scontonumerico }}&euro;
                                        @elseif($coupon->scontonumerico == 0 && $coupon->scontopercentuale != 0)
                                            {{ $coupon->scontopercentuale }}%
                                        @else
                                            {{ 0 }}&euro;
                                        @endif
                                    </td>
                                    <td>{{ $coupon->datainizio." / ".$coupon->datafine }}</td>
                                    <td>{{ $coupon->qta }}</td>
                                    <td><x-coupon-boxes box="{{ $coupon->idbox }}"></x-coupon-boxes></td>
                                    <td>
                                        <a href="{{ route('coupons.show', $coupon->id) }}"><i class="fa fa-eye mr-1" data-toggle="tooltip" data-original-title="Visualizza dati coupon"></i>
                                        <a href="{{ route('coupons.edit', $coupon->id) }}"><i class="fa fa-pencil mr-1" data-toggle="tooltip" data-original-title="Modifica coupon"></i></a>
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
</div>
@endsection
