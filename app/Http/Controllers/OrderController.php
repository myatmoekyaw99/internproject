<?php

namespace App\Http\Controllers;

use App\Order;
use App\Olist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show(){
        $o=Order::get();
        return view('orders.showorder',compact('o'));
    }

    public function viewOrder($id){
        
        $list = DB::table('items')
            ->join('olists', 'olists.product_id', '=', 'items.id')
            ->select('items.*','olists.qty as oqty')
            ->where('olists.order_id', '=',$id)
            ->get();
        return view('orders.vieworderlist',compact('list'));
    }

    public function searchOrder(Request $request){
        $q = $request->search;
        $o = Order::select("id","name","email","phone","address")
        ->where('name','LIKE','%'.$q.'%')->get();
        return view('orders.showorder',compact('o'));
    }

    public function destroy($id)
    {
        $d=Order::find($id);
        $d->delete();
        return redirect('showorder')->with('status','Successful delete!');
    }
}
