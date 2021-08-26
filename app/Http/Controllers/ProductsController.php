<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id','nome','grammatura','kcal','prezzo','attivo')->get();
        return view('products.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        Product::create([
            'nome' => $request->product_name,
            'grammatura' => $request->weight,
            'descrizione' => $request->description,
            'suggerimenti' => $request->tips,
            'kcal' => $request->kcal,
            'kcal100gr' => $request->kcal_100,
            'kj' => $request->kj,
            'carboidrati' => $request->carbohydrates,
            'proteine' => $request->proteins,
            'zuccheri' => $request->sugars,
            'grassi' => $request->fats,
            'grassisaturi' => $request->saturated_fats,
            'fibre' => $request->fibers,
            'sodio' => $request->sodium,
            'allergeni' => $request->allergens,
            'ingredienti' => $request->ingredients,
            'sale' => $request->salt,
            'caricoglicemico' => $request->glycemic_load,
            'indice_glicemico' => $request->glycemic_index,
            'prezzo' => $request->amount,
            'attivo' => $request->status,
            'menu_order' => $request->visibility_order,
            'nuovo' => $request->new_product,
            'shopfront' => $request->shopfront,
            'qta' => 1
        ]);

        return redirect()->route('products.index')->with('message', 'Prodotto creato con successo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $image = DB::table('img_prodotti')->select()->where('idProdotto', '=', $product->id)->first();
        return view('products.show', compact('product','image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update([
            'nome' => $request->product_name,
            'grammatura' => $request->weight,
            'descrizione' => $request->description,
            'suggerimenti' => $request->tips,
            'kcal' => $request->kcal,
            'kcal100gr' => $request->kcal_100,
            'kj' => $request->kj,
            'carboidrati' => $request->carbohydrates,
            'proteine' => $request->proteins,
            'zuccheri' => $request->sugars,
            'grassi' => $request->fats,
            'grassisaturi' => $request->saturated_fats,
            'fibre' => $request->fibers,
            'sodio' => $request->sodium,
            'allergeni' => $request->allergens,
            'ingredienti' => $request->ingredients,
            'sale' => $request->salt,
            'caricoglicemico' => $request->glycemic_load,
            'indice_glicemico' => $request->glycemic_index,
            'prezzo' => $request->amount,
            'attivo' => $request->status,
            'menu_order' => $request->visibility_order,
            'nuovo' => $request->new_product,
            'shopfront' => $request->shopfront
        ]);

        return redirect()->route('products.index')->with('message', 'Prodotto modificato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Prodotto eliminato con successo.');
    }
}
