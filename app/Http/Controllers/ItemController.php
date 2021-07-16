<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = DB::table('categories')->get();
        return view('Items.additem',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $t=Item::get();
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->get();
        // $p=Item::paginate(10);
        return view('items.showitem',compact('t'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $i=new Item;
        if($request->file()) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            //$filePath = $request->file('photo')->storeAs(public_path('uploads'), $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            // $std->photopath = '/storage/' . $filePath;
            $i->image=$fileName;
             //$fileModel->save();
            $i->name=$request->name;
            $i->price=$request->price;
            $i->category=$request->category;
            $i->description=$request->description;
            $i->save();
            return redirect('/items')->with('status','Successful Insert!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i=Item::find($id);
        $cat=Category::get(); 
        //var_dump($name);
        return view('/items/edititem',compact('i','cat')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'popular' => 'required',
        ]);

        $i=Item::find($id);
        if($request->file()) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            //$filePath = $request->file('photo')->storeAs(public_path('uploads'), $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            // $std->photopath = '/storage/' . $filePath;
            $i->image=$fileName;
             //$fileModel->save();
        }
        $i->name=$request->name;
        $i->price=$request->price;
        $i->category=$request->category;
        $i->description=$request->description;
        $i->popular = $request->popular;
        $i->save();
        return redirect('/items/create')->with('status','Successful Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Item::find($id);
        $d->delete();
        return redirect('items/create')->with('status','Successful delete!');
    }

    public function search(Request $request){
        $q = $request->search;
        $t = DB::table('items')
            ->join('categories', 'categories.id', '=', 'items.category')
            ->select('items.*', 'categories.name as cname')
            ->where('items.name','LIKE','%'.$q.'%')->get();
        
            return view('items.showitem',compact('t'));
    }
}
