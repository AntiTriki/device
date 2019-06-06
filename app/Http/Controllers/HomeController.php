<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::table('users')->paginate(8);
        $posi = DB::table('positions')->get();
        $branch = DB::table('branches')->get();
        $area = DB::table('areas')->get();

        //------------------PC
        $pc = DB::table('pcs')->paginate(8);


        return view('home',['user'=>$user,'posi'=>$posi,'branch'=>$branch,'area'=>$area,'pc'=>$pc]);
    }
}
