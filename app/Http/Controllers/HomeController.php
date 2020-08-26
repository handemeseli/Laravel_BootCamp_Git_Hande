<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function hello(){
         //$users = User::all(); //model kullanarak veri çekme
         //$users = DB::table('users');//veritabanından çeker
        //dd($users);

        //$products = Product::with(['user'])->get();
             $products= DB::table('users')
            ->join('products','products.created_by','=','users.id')
            ->select('users.name','products.name')
            ->get();
        return view('merhaba', compact('products'));//->with(['users'=> $users]);

    }
    public function listele(){
        $users = User::all();
        return view('users/index', compact('users'));
    }
    public function create(){
        $users = User::all();
        return view('users/create', compact('users'));
    }

}
