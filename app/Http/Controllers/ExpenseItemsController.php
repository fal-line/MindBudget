<?php

namespace App\Http\Controllers;

use App\Models\expenseItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(expenseItems $expenseItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expenseItems $expenseItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, expenseItems $expenseItems)
    {
        $items = DB::table('expense_items')
        ->where('boardOwner', $request->route('id'))
        ->select('id')
        ->get();


        $rowData = [];
        foreach($items as $i){
            foreach($i as $p){
                array_push($rowData, $p = "row_".$p);
            }
        }

        $a = [];
        $j =  [$request->input("name_2"), $request->input("desc_2")];
        // foreach () {

        //     $i = $reqs;
        //     array_push($a, $i);

        //     // DB::table('expense_items')->upsert([
        //     //     ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
        //     //     ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
        //     // ], ['departure', 'destination'], ['price']);
            
        // }

        // $a = [];
        // foreach ($request as $x) {
        //     $i = $x;
        //     array_push($a, $i);

        //     // DB::table('expense_items')->upsert([
        //     //     ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
        //     //     ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
        //     // ], ['departure', 'destination'], ['price']);
            
        // }
        


        // $b = [];
        // foreach($items as $i){
        //     foreach($i as $p){
        //         array_push($b, "row_".$p);
        //     }
        // }

        return view(dd($j, $a, $rowData)
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expenseItems $expenseItems)
    {
        //
    }
}
