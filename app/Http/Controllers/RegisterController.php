<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){

        $this->middleware(['guest']);
    }

    public function index(){

        return view('register');

    }

    public function store(Request $request){

        $this->validate($request, [
            // USER DATA
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            // RESTAURANT DATA
            'name_restaurant' => 'required|max:50',
            'img' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'VAT' => 'required|max:255',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);
       
        Restaurant::create([
            'name_restaurant' => $request->name_restaurant,
            'img' => $request->img,
            'phone' => $request->phone,
            'address' => $request->address,
            'VAT' => $request->VAT,
        ]);
        
        return redirect()->route('restaurant.index');

    }
}
