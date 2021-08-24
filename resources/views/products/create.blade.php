@extends('layouts.app')

@section('content')
<div class="app-content content">
<div class="content-wrapper">
<div class="content-header row">
   <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title mb-0">NUOVO PRODOTTO</h3>
      <div class="row breadcrumbs-top">
         <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
               <li class="breadcrumb-item"><a href="{{ route('products.index') }}">PRODOTTI</a></li>
               <li class="breadcrumb-item active">NUOVO PRODOTTO</li>
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
               <h4 class="card-title" id="horz-layout-colored-controls">NUOVO PRODOTTO</h4>
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
                  <form class="form form-horizontal" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="form-body">
                        <h4 class="form-section"><i class="fa fa-eye"></i> DATI PRODOTTO</h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="nome_prodotto">Nome Prodotto</label>
                                 <div class="col-md-9">
                                    <input type="text" id="nome_prodotto" class="form-control border-primary @error('product_name') is-invalid @enderror" placeholder="Nome Prodotto" name="product_name" value="{{old('product_name')}}">
                                    @error('product_name')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="grammatura">Grammatura</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="grammatura" class="form-control border-primary @error('weight') is-invalid @enderror" placeholder="Grammatura" name="weight" value="{{old('weight')}}">
                                    @error('weight')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="descrizione">Descrizione</label>
                                 <div class="col-md-9">
                                    <textarea id="descrizione" rows="5" class="form-control border-primary @error('description') is-invalid @enderror" name="description" placeholder="Descrizione">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="suggerimenti">Suggerimenti</label>
                                 <div class="col-md-9">
                                    <textarea id="suggerimenti" rows="5" class="form-control border-primary @error('tips') is-invalid @enderror" name="tips" placeholder="Suggerimenti">{{old('tips')}}</textarea>
                                    @error('tips')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="kcal">Kcal</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="kcal" class="form-control border-primary @error('kcal') is-invalid @enderror" placeholder="Kcal" name="kcal" value="{{old('kcal')}}">
                                    @error('kcal')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="kcal_100">Kcal 100g</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="kcal_100" class="form-control border-primary @error('kcal_100') is-invalid @enderror" placeholder="Kcal 100g" name="kcal_100" value="{{old('kcal_100')}}">
                                    @error('kcal_100')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="kj">Kj</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="kj" class="form-control border-primary @error('kj') is-invalid @enderror" placeholder="Kj" name="kj" value="{{old('kj')}}">
                                    @error('kj')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="carboidrati">Carboidrati</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="carboidrati" class="form-control border-primary @error('carbohydrates') is-invalid @enderror" placeholder="Carboidrati" name="carbohydrates" value="{{old('carbohydrates')}}">
                                    @error('carbohydrates')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="proteine">Proteine</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="proteine" class="form-control border-primary @error('proteins') is-invalid @enderror" placeholder="Proteine" name="proteins" value="{{old('proteins')}}">
                                    @error('proteins')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="zuccheri">Zuccheri</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="zuccheri" class="form-control border-primary @error('sugars') is-invalid @enderror" placeholder="Zuccheri" name="sugars" value="{{old('sugars')}}">
                                    @error('sugars')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="grassi">Grassi</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="grassi" class="form-control border-primary @error('fats') is-invalid @enderror" placeholder="Grassi" name="fats" value="{{old('fats')}}">
                                    @error('fats')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="grassi_saturi">Grassi Saturi</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="grassi_saturi" class="form-control border-primary @error('saturated_fats') is-invalid @enderror" placeholder="Grassi Saturi" name="saturated_fats" value="{{old('saturated_fats')}}">
                                    @error('saturated_fats')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="fibre">Fibre</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="fibre" class="form-control border-primary @error('fibers') is-invalid @enderror" placeholder="Fibre" name="fibers" value="{{old('fibers')}}">
                                    @error('fibers')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="sodio">Sodio</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="sodio" class="form-control border-primary @error('sodium') is-invalid @enderror" placeholder="Sodio" name="sodium" value="{{old('sodium')}}">
                                    @error('sodium')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="allergeni">Allergeni</label>
                                 <div class="col-md-9">
                                    <textarea id="allergeni" rows="5" class="form-control border-primary @error('allergens') is-invalid @enderror" name="allergens" placeholder="Allergeni">{{old('allergens')}}</textarea>
                                    @error('allergens')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="ingredienti">Ingredienti</label>
                                 <div class="col-md-9">
                                    <textarea id="ingredienti" rows="5" class="form-control border-primary @error('ingredients') is-invalid @enderror" name="ingredients" placeholder="Ingredienti">{{old('ingredients')}}</textarea>
                                    @error('ingredients')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="sale">Sale</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="sale" class="form-control border-primary @error('salt') is-invalid @enderror" placeholder="Sale" name="salt" value="{{old('salt')}}">
                                    @error('salt')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="carico_glicemico">Carico glicemico</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="carico_glicemico" class="form-control border-primary @error('glycemic_load') is-invalid @enderror" placeholder="Carico glicemico" name="glycemic_load" value="{{old('glycemic_load')}}">
                                    @error('glycemic_load')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="indice_glicemico">Indice glicemico</label>
                                 <div class="col-md-9">
                                    <input type="number" step="0.01" id="indice_glicemico" class="form-control border-primary @error('glycemic_index') is-invalid @enderror" placeholder="Indice glicemico" name="glycemic_index" value="{{old('glycemic_index')}}">
                                    @error('glycemic_index')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="prezzo_prodotto">Prezzo</label>
                                 <div class="col-md-9">
                                    <input type="number" id="prezzo_prodotto" class="form-control border-primary @error('amount') is-invalid @enderror" placeholder="Prezzo" name="amount" value="{{old('amount')}}">
                                    @error('amount')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="stato_prodotto">Status</label>
                                 <div class="col-md-9">
                                    <select id="stato_prodotto" name="status" class="form-control border-primary @error('status') is-invalid @enderror">
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }} >Inattivo</option>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }} >Attivo</option>
                                    </select>
                                    @error('status')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="ordine_visibilita">Ordine visibilit&aacute;</label>
                                 <div class="col-md-9">
                                    <input type="number" id="ordine_visibilita" class="form-control border-primary @error('visibility_order') is-invalid @enderror" placeholder="Ordine Prodotto" name="visibility_order" value="{{old('visibility_order')}}">
                                    @error('visibility_order')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="nuovo_prodotto">Nuovo prodotto</label>
                                 <div class="col-md-9">
                                    <select id="nuovo_prodotto" name="new_product" class="form-control border-primary @error('new_product') is-invalid @enderror">
                                        <option value="1" {{ old('new_product') == 1 ? 'selected' : '' }}>Si</option>
                                        <option value="0" {{ old('new_product') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('new_product')
                                        <span class="danger float-right" role="alert">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group row">
                                 <label class="col-md-3 label-control" for="shop_principale">Shop principale</label>
                                 <div class="col-md-9">
                                    <select id="shop_principale" name="shopfront" class="form-control border-primary @error('shopfront') is-invalid @enderror">
                                        <option value="0" {{ old('shopfront') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('shopfront') == 1 ? 'selected' : '' }}>Si</option>
                                    </select>
                                    @error('shopfront')
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
