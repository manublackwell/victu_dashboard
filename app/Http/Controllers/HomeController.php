<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::count();
        $coupons = Coupon::count();
        $orders = Order::count();
        return view('home' , compact('users', 'coupons', 'orders'));
    }
}
