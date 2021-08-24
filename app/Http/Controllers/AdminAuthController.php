<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function create(AdminAuthCreateRequest $request){
        User::create([
            'nome' => $request->name,
            'cognome' => $request->surname,
            'email' => $request->email,
            'password' => openssl_digest($request->password, "sha512"),
            'attivo' => User::ACCOUNT_ACTIVE,
            'livello' => User::USER_LEVEL,
            'condizioni' => User::CONDITIONS_ACCEPTED,
            'is_admin' => 0
        ]);

        //return redirect()->route()->with("success", "Account creato con successo!");
    }

    public function check(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" =>"required"
        ]);

        $user = User::where('email','=', $request->email)->first();
        if($user){
            if(openssl_digest($request->password, "sha512") == $user->password){
                if($user->is_admin == 1){
                    $request->session()->put('AdminUser', $user->id);
                    $request->session()->put('is_admin', true);
                    return redirect(route('home'));
                }else{
                    return back()->with('fail', 'Accesso negato.');
                }
            }else{
                return back()->with('fail', 'Le credenziali inserite non sono corrette.');
            }
        }else{
            return back()->with('fail','Nessun account trovato con la segeunte email');
        }
    }

    public function logout(){
        if(session()->has('AdminUser')){
            session()->pull('AdminUser');
            return redirect(route('login'));
        }
    }
}
