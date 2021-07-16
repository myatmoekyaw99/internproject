<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Cart;
use App\Customer;
use App\Order;
use App\Olist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function index(){

        $cart = DB::table('carts')->count();
        $c=Category::get();
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->where('items.popular', '=','1')
            ->get();
        return view('frontend.home',compact('c','t','cart'));
    }

    public function about(){
        $cart = DB::table('carts')->count();
        return view('frontend.about',compact('cart'));
    }

    public function viewProduct($id){
        $t=Item::find($id);
        return view('frontend.viewitem',compact('t'));
    }

    public function checkout(){
        $id=session()->get('cid');
        $c = Customer::find($id);
        // dd($c);
        $cart = DB::table('carts')->count();
        return view('frontend.checkout',compact('c','cart'));
    }

    public function saveOrder(Request $request,$id){
        $c=Cart::get();
        // $customer=Customer::find($id);
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        $o = new Order;
        $o->name = $request->name;
        $o->email = $request->email;
        $o->phone = $request->phone;
        $o->address = $request->address;
        $o->save();

        if($c){
            foreach($c as $carts){
                $olist = new Olist;
                $olist->order_id = $id;
                $olist->product_id = $carts->item_id;
                $olist->qty = $carts->qty;
                $olist->save();

                Cart::find($carts->id)->delete();
            }

        }
            
        return redirect('/')->with('success','Order successfully added.');
    }
}
