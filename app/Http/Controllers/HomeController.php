<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $boards = DB::table('expense_boards')
            ->where('userOwner', Auth::user()->id)
            ->select('id','boardName', 'urgency','created_at','boardCur')
            ->get();
        return view('home', ['boards' => $boards]);
    }
}
