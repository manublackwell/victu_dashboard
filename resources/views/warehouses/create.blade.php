@extends('layouts.app')

@section('content')
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
   <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">NUOVO MAGAZZINO</h3>
      <div class="row breadcrumbs-top">
         <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
               <li class="breadcrumb-item"><a href="{{ route('products') }}">MAGAZINO</a></li>
               <li class="breadcrumb-item active">NUOVO MAGAZZINO</li>
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
               <h4 class="card-title" id="horz-layout-colored-controls">NUOVO MAGAZZINO</h4>
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
                  <form class="form form-horizontal" method="post" action="{{ route('store-product') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="form-body">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        @endif
                        <h4 class="form-section"><i class="fa fa-eye"></i> DATI MAGAZZINO</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="nome_prodotto">Email</label>
                                 <div class="col-md-9">
                                    <input type="text" id="nome_prodotto" class="form-control border-primary" placeholder="Nome Prodotto" name="product_name" value="{{old('product_name')}}">
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