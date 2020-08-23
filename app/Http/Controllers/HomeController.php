<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function merhaba(){
        $users = User::all(); //model kullanarak veri çekme
        //$users = DB::table('users')->get(); //veritabanından çeker
        //dd($users);
        return view('merhaba', compact('users')); //->with(['users'=> $users]);

    }
}
