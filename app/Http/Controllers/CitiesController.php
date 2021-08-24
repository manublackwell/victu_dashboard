<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function getCitiesOfProvince(Request $request){
        $validated = $request->validate([
            
        ]);
        $provinces = Provinces::where('provincia', $request->province)->get();
        
    }   
}
