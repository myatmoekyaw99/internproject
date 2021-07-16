<?php

namespace App\Http\Controllers;

use App\Item;
use App\Cart;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        // $id = $request->id;
        $item = Item::find($id);
        if(!$item) {
            abort(404);
        }

        $validatedData = $request->validate([
            'qty' => 'required',
        ]);
        $c=new Cart;
        // if(isset(Auth::user()->id)){
        //     $cid = Auth::user()->id ;
        //     $c->customer_id=$cid;	
        // }else{
        //     $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);	
        //     $c->client_ip=$ip;
        // }
        $c->item_id=$item->id;
        $c->price=$item->price;
        $c->qty=$request->qty;
        $c->save();
        // $cart = session()->get('cart');

        // if cart is empty then this the first product
        // if(!$cart) {

        //     $cart = [
        //             $id => [
        //                 "name" => $item->name,
        //                 "quantity" => 1,
        //                 "price" => $item->price,
        //                 "image" => $item->image,
        //                 // "description" => $item->description,
        //             ]
        //     ];

        //     session()->put('cart', $cart);

        //     return redirect()->back()->with('success', 'Food added to cart successfully!');
        // }

        // if cart not empty then check if this product exist then increment quantity
        // if(isset($cart[$id])) {

        //     $cart[$id]['quantity']++;

        //     session()->put('cart', $cart);

        //     return redirect()->back()->with('success', 'Food added to cart successfully!');

        // }

        // // if item not exist in cart then add to cart with quantity = 1
        // $cart[$id] = [
        //     "name" => $item->name,
        //     "quantity" => 1,
        //     "price" => $item->price,
        //     "image" => $item->image
        //     // "description" => $item->description,
        // ];

        // session()->put('cart', $cart);
        return redirect()->intended()->with('success', 'Food added to cart successfully!');
        // return redirect()->route('cartshow')->with('success', 'Food added to cart successfully!');
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
    public function show()
    {
        $c = DB::table('carts')
            ->join('items', 'items.id', '=', 'carts.item_id')
            ->select('carts.*','items.name as cname','items.image as cimage')
            ->get();
        $cart = DB::table('carts')->count();
        return view('frontend.cart',compact('c','cart'));
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
    public function update(Request $request)
    {
        $id = $request->id;
        $qty = $request->quantity;
        $q = Cart::find($id);

        $q->qty = $qty;
        $q->save();
        session()->flash('success', 'Cart updated successfully');
        // if($request->id and $request->quantity)
        // {
        //     $cart = session()->get('cart');

        //     $cart[$request->id]["quantity"] = $request->quantity;

        //     session()->put('cart', $cart);

        //     session()->flash('success', 'Cart updated successfully');
        // }
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

    public function remove(Request $request)
    {

        $id = $request->id;
        $c = Cart::find($id);
        $c->delete();
        // if($request->id) {

        //     $cart = session()->get('cart');

        //     if(isset($cart[$request->id])) {

        //         unset($cart[$request->id]);

        //         session()->put('cart', $cart);
        //     }

        //     session()->flash('success', 'Product removed successfully');
        // }
        session()->flash('success','Product removed successfully');
    }
}
