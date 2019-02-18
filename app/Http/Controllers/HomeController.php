<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;

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
        $data = DB::table('cases')
        ->select(DB::raw('category, count(category) as category_count '))
        ->groupBy('category')
        ->get();
        return view('home', compact('data'));
    }
}
