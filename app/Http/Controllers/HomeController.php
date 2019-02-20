<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\cases;

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
        $data2 = DB::table('cases')
        ->select(DB::raw('solved, count(solved) as solved_count'))
        ->groupBy('solved')
        ->get();
        $latestcases = Cases::orderBy('created_at', 'asc')->take(5)->get();
        return view('home', compact('data', 'data2', 'latestcases'));


    }
}
