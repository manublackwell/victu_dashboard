<?php

namespace App\Http\Controllers;

use App\Http\Requests\Warehouse\WarehouseStoreRequest;
use App\Http\Requests\Warehouse\WarehouseUpdateRequest;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubs = Warehouse::select('account.id','account.nome','account.cognome','account.email', DB::raw('SUM(qta) AS qta'))
        ->join('account','magazzini_hub.idHub','=','account.id')
        ->groupBy('account.id')
        ->get();

        $hub_accounts = User::select("id", "email")
        ->where('livello', User::HUB_LEVEL)
        ->whereNotIn("id", function($query){
            $query->from("magazzini_hub")
            ->select("idHub");
        })->get();

        return view('warehouses.index', compact('hubs','hub_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseStoreRequest $request)
    {
        $account = User::where('id', $request->hub_account)
                    ->where('livello', User::HUB_LEVEL)->get();

        if (!$account->first()){
            return redirect()->back()->with('error', 'E\' stato riscontrato un errore. L\'account selezionato non ha i requisiti per essere un hub.' );
        }

        $products = Product::select('id')->get();

        foreach($products as $product){
            Warehouse::create([
                'idHub' => $request->hub_account,
                'idProdottoHub' => $product->id,
                'qta' => 0,
                'attivo' => Warehouse::STATUS_NON_ATTIVO
            ]);
        }

        return redirect(route('warehouses.index'))->with('success', 'Operazione effettuata con successo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        $products = Warehouse::select('prodotti.id','prodotti.nome','magazzini_hub.qta','magazzini_hub.attivo')
        ->join('prodotti','magazzini_hub.idProdottoHub','=','prodotti.id')
        ->where('idHub',$warehouse->id)
        ->get();

        return view('warehouses.show', compact('products','warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseUpdateRequest $request, Warehouse $warehouse)
    {
        $warehouse->where('idProdottoHub', '=', $request->product_id)
        ->update([
            'qta' => $request->product_quantity
        ]);

        return redirect()->route('warehouses.show', $warehouse->id)->with('success', 'Quantità del prodotto modificata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->route('warehouses.index')->with('message', 'Magazzino eliminato con successo!');
    }
}
