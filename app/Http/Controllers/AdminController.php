<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\UsersendMessage;
use App\Models\Tags;
use App\Models\AfterAddProduct;

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


    public function addtags()
    {
        $showtag=Tags::orderBy('id','desc')->get();
        return view('admin.addtags',['showtag'=>$showtag]);
    }

    public function storetags(Request $request)
    {
        Tags::create([
            'tags_name'=>$request->get('tname'),
        ]);
        $request->session()->flash('msg','Tags Is Added');
        return redirect()->back();
    }

    public function addproduct()
    {
        $category=Category::orderBy('id','asc')->get();
        return view('admin.addproduct',['category'=>$category]);
    }


    public function storeproduct(Request $request)
    {
        $image=null;
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=mt_rand(10001,9999999).'_'.$file->
            getClientOriginalName();
            $file->move('admin/upload/products/',$image);
        }
        product::create([
        'product_name'=>$request->get('pname'),
        'product_price'=>$request->get('price'),
        'product_quantity'=>$request->get('quantity'),
        'product_description'=>$request->get('description'),
        'product_image'=>$image,
        'category_id'=>$request->get('category')

        ]);
        $request->session()->flash('message','product has been added successfully');
        return redirect()->route('admin.afteraddproduct');
    }

    public function afteraddproduct()
    {
        $afteraddpro=Category::orderBy('id','asc')->get();
        $afteraddprod=Tags::orderBy('id','asc')->get();
        return view('admin.afteraddproduct',['afteraddpro'=>$afteraddpro],['afteraddprod'=>$afteraddprod]);
    }

    public function storeafteraddproduct(Request $request)
    {
        AfterAddProduct::create([
        'category_names'=>$request->get('category'),
        'tag_names'=>$request->get('tag'),
        ]);
        $request->session()->flash('msg','product has been added successfully');
        return redirect()->route('admin.showproduct');
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

    public function showproduct()
    {
        $showproduct=Product::orderBy('id','desc')->get();
        return view('admin.showproduct',['showproduct'=>$showproduct]);
    }

//user send message
    public function usersendmessage()
    {
        $showusermessage=usersendmessage::orderBy('id','desc')->get();
        return view('admin.usersendmessage',['showusermessage'=>$showusermessage]);
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

    public function editproduct($id)
    {
        $category=Category::orderBy('id','asc')->get();
        $product=Product::find($id);
        return view('admin.editproduct',compact('category','product'));
    }

    public function updateproduct(Request $request, $id)
    {
         $product=Product::find($id);
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=mt_rand(10001,9999999).'_'.$file->
            getClientOriginalName();
            $file->move('admin/upload/products/',$image);

            if ($product->product_image) {
            //to remove image for folder
            unlink('admin/upload/products/'.$product->product_image);
        }
        $product->product_image=$image;
        }

        $product->update([
            'product_name'=>$request->get('pname'),
            'product_price'=>$request->get('price'),
            'product_quantity'=>$request->get('quantity'),
            'product_description'=>$request->get('description'),
            'product_image'=>$image,
            'category_id'=>$request->get('category')
        ]);
        $request->session()->flash('updatemessage','Product Has Been Update Successfully');
        return redirect()->route('admin.showproduct');
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
    public function destroyproduct(Request $request, $id)
    {
        $product=product::find($id);
        if($product->product_image){
        // to remove image form folder
        unlink('admin/upload/products/'.$product->product_image);
          }
        $product->delete();
        $request->session()->flash('message','product has been delete successfully');
        return redirect()->back();
}
}
