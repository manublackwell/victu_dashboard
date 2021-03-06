@extends('layouts.app')

@section('content')
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
   <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">MODIFICA COUPON: {{ $coupon->codice }}</h3>
      <div class="row breadcrumbs-top">
         <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
               <li class="breadcrumb-item"><a href="{{ route('coupons.index') }}">COUPONS</a></li>
               <li class="breadcrumb-item active">MODIFICA COUPON: {{ $coupon->codice }}</li>
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
               <h4 class="card-title" id="horz-layout-colored-controls">MODIFICA COUPON: {{ $coupon->codice }}</h4>
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
                  <form class="form form-horizontal" method="post" action="{{ route('coupons.update', $coupon->id) }}">
                  @method('PUT')
                    @csrf
                     <div class="form-body">
                        <h4 class="form-section"><i class="fa fa-eye"></i> DATI COUPON</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="sconto_numerico">Sconto numerico</label>
                                 <div class="col-md-9">
                                    <input type="number" id="sconto_numerico" class="form-control border-primary @error('numeric_discount') is-invalid @enderror" placeholder="Sconto numerico" name="numeric_discount" value="{{ $coupon->scontonumerico }}">
                                    @error('numeric_discount')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="sconto_percentuale">Sconto percentuale</label>
                                 <div class="col-md-9">
                                    <input type="number" id="sconto_percentuale" class="form-control border-primary @error('percentage_discount') is-invalid @enderror" name="percentage_discount" placeholder="Sconto percentuale" value="{{ $coupon->scontopercentuale }}">
                                    @error('percentage_discount')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="data_inizio">Data inizio</label>
                                 <div class="col-md-9">
                                    <input type="date" id="data_inizio" class="form-control border-primary @error('start_date') is-invalid @enderror" name="start_date" placeholder="Data inizio" value="{{ $coupon->datainizio }}">
                                    @error('start_date')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="data_fine">Data fine</label>
                                 <div class="col-md-9">
                                    <input type="date" id="data_fine" class="form-control border-primary @error('end_date') is-invalid @enderror" name="end_date" placeholder="Data fine" value="{{ $coupon->datafine }}">
                                    @error('end_date')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="quantita">Quantit??</label>
                                 <div class="col-md-9">
                                    <input type="number" id="quantita" class="form-control border-primary @error('quantity') is-invalid @enderror" placeholder="Quantit??" name="quantity" value="{{ $coupon->qta }}">
                                 </div>
                                @error('quantity')
                                    <span class="danger float-right" role="alert">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="mediatore">Mediatore</label>
                                    <div class="col-md-9">
                                        <select name="mediator" id="mediatore" class="form-control border-primary @error('mediator') is-invalid @enderror">
                                            @foreach($mediators as $mediator)
                                                <option value="{{ $mediator->id }}" {{ $coupon->idmediatore == $mediator->id ? "selected" : "" }}">{{ $mediator->nome." ".$mediator->cognome}}</option>
                                            @endforeach
                                        </select>
                                        @error('mediator')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="box">Box {{ $coupon->idbox }}</label>
                                    <div class="col-md-9">
                                        <select name="box" id="box" class="form-control border-primary @error('box') is-invalid @enderror">
                                             <option value="0" {{ $coupon->idBox == \App\Models\Coupon::NO_BOX ? "selected" : "" }}>Nessun box</option>
                                             @foreach($boxes as $box)
                                                <option value="{{ $box->id }}" {{ $coupon->idbox == $box->id ? "selected" : "" }}>{{ $box->nome }}</option>
                                             @endforeach
                                        </select>
                                        @error('box')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="multi-uso">Utilizzo singolo</label>
                                    <div class="col-md-9">
                                        <select name="multiuse" id="multi-uso" class="form-control border-primary @error('multiuse') is-invalid @enderror">
                                                <option value="0" {{ $coupon->multiuse == 0 ? "selected" : "" }}>No</option>
                                                <option value="1" {{ $coupon->multiuse == 1 ? "selected" : "" }}>Si</option>
                                        </select>
                                        @error('multiuse')
                                            <span class="danger float-right" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="buono-pasto">Buono pasto</label>
                                    <div class="col-md-9">
                                        <select name="meal_voucher" id="buono-pasto" class="form-control border-primary @error('meal_voucher') is-invalid @enderror">
                                                <option value="0" {{ $coupon->buono_pasto == 0 ? "selected" : "" }}>No</option>
                                                <option value="1" {{ $coupon->buono_pasto == 1 ? "selected" : "" }}>Si</option>
                                        </select>
                                        @error('meal_voucher')
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
</div>
@endsection
