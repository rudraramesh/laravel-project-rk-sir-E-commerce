<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }



    public function index()
    {
        return view('admin.adminhome');
    }

    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function addproduct()
    {
        $category=Category::orderBy('id','asc')->get();
        return view('admin.addproduct',['category'=>$category]);
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
        category::create([
            'category_name'=>$request->get('cname')
        ]);

        $request->session()->flash('message','Category has been added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $showdata=category::orderBy('id','desc')->get();
        return view('admin.addcategory',['showdata'=>$showdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $category=category::find($id);
        return view('admin.editcategory',compact('category'));
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
        $category=category::find($id);

        $category->update([
         'category_name'=>$request->get('cname')
        ]);
        $request->session()->flash('message','Category has Been updated successfully');

        return redirect()->route('admin.addcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category=category::find($id);

        $category->delete();
        $request->session()->flash('message','category has been delete successfully');
        return redirect()->back();
}
}
