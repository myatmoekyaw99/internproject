<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = DB::table('carts')->count();
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->get();
        return view('frontend.food',compact(['t','cart']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = DB::table('carts')->count();
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->where('categories.id','=',$id)
            ->get();
        return view('frontend.food',compact(['t','cart']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $cart = DB::table('carts')->count();
        $q = $request->search;
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->where('items.name','LIKE','%'.$q.'%')->get();
        
            return view('frontend.food',compact(['t','cart']));
    }
}
