<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coupon\CouponStoreRequest;
use App\Http\Requests\Coupon\CouponUpdateRequest;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::select('id','codice','scontonumerico','scontopercentuale',
                    'datainizio','datafine','qta','idbox')
                    ->orderBy('id','desc')->get();
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediators = DB::table('mediatori')->get();
        $boxes = DB::table('boxes')->get();
        return view('coupons.create', compact('mediators','boxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponStoreRequest $request)
    {
        Coupon::insert([
            'codice' => $request->code,
            'scontonumerico' => $request->numeric_discount,
            'scontopercentuale' => $request->percentage_discount,
            'datainizio' => $request->start_date,
            'datafine' => $request->end_date,
            'qta' => $request->quantity,
            'idmediatore' => $request->mediator,
            'idbox' => $request->box,
            'multiuse' => $request->multiuse,
            'buono_pasto' => $request->meal_voucher
        ]);

        return redirect()->route('coupons.index')->with('success','Coupon creato con successo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::where('id',$id)->first();
        $orders = Order::where('idCoupon', $id)->get();
        return view('coupons.show', compact('coupon','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $mediators = DB::table('mediatori')->get();
        $boxes = DB::table('boxes')->get();
        return view('coupons.edit', compact('coupon', 'boxes', 'mediators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        $coupon->udpate([
            'scontonumerico' => $request->numeric_discount,
            'scontopercentuale' => $request->percentage_discount,
            'datainizio' => $request->start_date,
            'datafine' => $request->end_date,
            'qta' => $request->quantity,
            'idmediatore' => $request->mediator,
            'idbox' => $request->box,
            'multiuse' => $request->multiuse,
            'buono_pasto' => $request->meal_voucher
        ]);

        return redirect()->route('coupons.index')->with('success','Coupon modificato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success','Coupon eliminato con successo.');
    }
}
