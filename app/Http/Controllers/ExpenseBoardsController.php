<?php

namespace App\Http\Controllers;

use App\Models\expenseBoards;
use App\Models\expenseItems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExpenseBoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $boards = DB::table('expense_boards')
            ->where('id', $request->route('id'))
            ->select('id', 'boardName', 'urgency','boardCur')
            ->get();
        $items = DB::table('expense_items')
            ->where('boardOwner', $request->route('id'))
            ->select('id', 'itemName', 'itemDesc','itemPrice','status')
            ->get();
        return view('boards/board', ['boards' => $boards, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(expenseBoards $expenseBoards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expenseBoards $expenseBoards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expenseBoards $expenseBoards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expenseBoards $expenseBoards)
    {
        //
    }
}
