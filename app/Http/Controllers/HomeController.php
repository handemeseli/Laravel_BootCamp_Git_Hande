<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function hello()
    {
        //$users = User::all(); //model kullanarak veri çekme
        //$users = DB::table('users');//veritabanından çeker
        //dd($users);

        $products = Product::with(['user'])->get();
        $users = DB::table('users')
            ->join('products', 'users.id', '=', 'products.created_by')
            ->select('users.*', 'users.name', 'products.name')
            ->get();
        return view('merhaba', compact('products'));//->with(['users'=> $users]));

    }

    public function createView()
    {
        return view('users.create');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $password =$request->get('password');

        //$users = User::all();
        DB::table('users')->insert([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($password)
        ]);
        //return view('users/create', compact('users'));
        return 'kayıt başarılı';
    }
    public function indexView()
    {
        $users = User::where('deleted_at','=',null)->get();
        return view('users.index', compact('users'));
    }


    public function delete($id)
    {
        // DB::table('users')->where('id','=',$id)->delete(); // Hard delete ile veriyi kalıcı siler. TAVSİYE EDİLMEZ!
        DB::table('users')->where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);
        return 'Başarıyla Silindi';
    }
    public function updateView($id)
    {
        $user = User::where('id',$id)->get();
        $user = $user->first();
        return view('users.update',compact('user'));
    }

    public function update(Request $request,$id)
    {
             User::where('id',$id)->update([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'updated_at'=> Carbon::now()
        ]);

        return 'Başarıyla güncellendi.';
    }

}
