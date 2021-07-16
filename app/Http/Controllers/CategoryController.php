<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=Category::get();
       
        return view('categories.show',compact('c'));
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
            'description' => 'required',
            'image' => 'required',
        ]);

        // $name=$request->get('name');
        // $des=$request->get('description');
        
        $c=new Category;
        if($request->file()) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            //$filePath = $request->file('photo')->storeAs(public_path('uploads'), $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            // $std->photopath = '/storage/' . $filePath;
            $c->image=$fileName;
             //$fileModel->save();
            $c->name=$request->name;
            $c->description=$request->description;
            $c->save();
            return redirect('/categories')->with('status','Successful Insert!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c=Category::find($id);
        //var_dump($name);
        
        return view('/categories/edit',compact('c')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'image' => 'required',
        ]);
        
        $c=Category::find($id);
        if($request->file()) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            //$filePath = $request->file('photo')->storeAs(public_path('uploads'), $fileName);
            $request->image->move(public_path('uploads'), $fileName);
            // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            // $std->photopath = '/storage/' . $filePath;
             //$fileModel->save();
            $c->image=$fileName;
        }
            $c->name=$request->name;
            $c->description=$request->description;
            $c->save();
            return redirect('/categories/create')->with('status','Successful Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Category::find($id);
        $d->delete();
        return redirect('categories/create')->with('status','Successful delete!');
    }

    public function search(Request $request){
        $q = $request->search;
        $c = Category::select("id","name","description","image")
        ->where('name','LIKE','%'.$q.'%')->get();
        return view('categories.show',compact('c'));
    }
}
