<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Cart;
use App\Customer;
use Session;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function showLoginForm(){
        $cart = DB::table('carts')->count();
        return view('frontend.login',compact('cart'));
    }

    public function showRegisterForm(){
        $cart = DB::table('carts')->count();
        return view('frontend.register',compact('cart'));
    }

    public function createCustomer(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $c =new Customer;
        $c->name = $request->name;
        $c->email = $request->email;
        $c->password = bcrypt($request->password);
        $c->phone = $request->phone;
        $c->address = $request->address;
        $c->save();
        // dd('ok');
        // $cart = DB::table('carts')->count();
        return redirect('/login/customer');
    }

    public function customerLogin(Request $request){

        $customer = Customer::where('email', $request->email)->first();

        if(password_verify($request->password, $customer->password)){
            // Session::put('c_id',$customer->id);
            // Session::put('c_name',$customer->name);
            $request->session()->put('cid',$customer->id);
            $request->session()->put('cname',$customer->name);
            // return $request->session()->get('cid');
            return redirect('/checkout');
            
            // dd('password correct!');
        }else{
            return redirect('/login/customer')->with('success','Your password is incorrect!!!');
            // dd('password incorrect!!!!!');
        }
        // $cart = DB::table('carts')->count();
        // return view('frontend.register',compact('cart'));
    }

    public function logout(){
        // $cid = session()->get('cid');
        // $name = session()->get('cname');
        // unset($cid);
        // unset($name);
        // session()->put('cid', $cid);
        // session()->put('cid', $name);
        session()->forget('cid');
        session()->forget('cname');
        return redirect('/login/customer');
    }

    public function show()
    {
        $c=Customer::get();
        return view('customers.showcustomer',compact('c'));
    }

    public function destroy($id)
    {
        $a=Customer::find($id);
        $a->delete();
        return redirect('/showcustomer')->with('status','Successful delete!');
    }

    public function search(Request $request){
        $q = $request->search;
        $c = Customer::select("id","name","email","password","phone","address")
        ->where('name','LIKE','%'.$q.'%')->get();
        return view('customers.showcustomer',compact('c'));
    }
}
