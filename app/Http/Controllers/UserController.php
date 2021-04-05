<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersendMessage;
use App\Models\UserRegisterLogin;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductComment;
use App\Models\Tags;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.homepage');
    }

    public function product()
    {
         $showproduct=product::orderBy('id','desc')->get();
        return view('user.product',['showproduct'=>$showproduct]);
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function about()
    {
        return view('user.about');
    }

    public function services()
    {
        return view('user.services');
    }

    public function pricing()
    {
        return view('user.pricing');
    }

    public function team()
    {
        return view('user.team');
    }

    public function blog()
    {
        return view('user.blog');
    }


    public function myprofile()
    {
        // $profile=UserRegisterLogin::find($id);
        // return view('user.myprofile',compact('profile'));
        $profiles=UserRegisterLogin::orderBy('id','desc')->limit(1)->get();
        return view('user.myprofile',['profiles'=>$profiles]);
    }
    public function editprofile($id)
    {
         $editprofile=UserRegisterLogin::find($id);
         return view('user.editprofile',compact('editprofile'));
        
    }
    public function updateprofile(Request $request, $id)
    {
         $profile=UserRegisterLogin::find($id);

        $profile->update([
            'first_name'=>$request->get('fname'),
            'last_name'=>$request->get('lname'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);
        $request->session()->flash('msg','update successfully');
        return redirect()->back();
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
    public function storemessage(Request $request)
    {
        UsersendMessage::create([
            'your_name'=>$request->get('name'),
            'your_email'=>$request->get('email'),
            'your_subject'=>$request->get('subject'),
            'your_message'=>$request->get('message')
        ]);
        $request->session()->flash('msg','Check Your Email Your Message Reply After 1 hour Thank you');
        return redirect()->back();
    }

    public function userregister()
    {
        return view('user.userregister');
    }
    public function storeregister(Request $request)
    {
        userregisterlogin::create([
            'first_name'=>$request->get('fname'),
            'last_name'=>$request->get('lname'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);
        $request->session()->flash('msg','register successfully');
        return redirect()->route('myprofile');
    }
    public function showprofile()
    {
         $showprofile=userregisterlogin::orderBy('id','desc')->limit(1)->get();
         return view('user.showprofile',['showprofile'=>$showprofile]);

        
    }


    //  public function userlogin(Request $request, $id)
    //  {
    //       $userregisterlogin=userregisterlogin::find($id);

    //      $userregisterlogin->login([
    //          'email'=>$request->get('email'),
    //          'password'=>$request->get('password')
    //      ]);
    //      $request->session()->flash('msg','Login successfully');
    //      return redirect()->back();

    //  }
    public function userlogins()
    {
        return view('user.userlogin');
    }

    public function productdetails($id)
    {
        $details=Product::find($id);
        $recent=Product::orderBy('id','desc')->limit(5)->get();
        $categorys=Category::withCount('products')->get();
        // yauta category vitra kati wota post xa vane count garna lai "withCount" gareko
        $category=Category::orderBy('id','desc')->limit(10)->get();
        $showcomment=ProductComment::orderBy('id','desc')->get();
        $showtags=Tags::orderBy('id','asc')->get();

        return view('user.productdetails',compact('details','recent','showcomment','category','showtags','categorys'));
    }

    public function search(Request $request)
    {
        $searchitem=$request->get('search');
        $result=Product::orderBy('id','desc')->where('product_name','like','%'.$searchitem.'%')->get();
        return view('user.searchproduct',['result'=>$result]);
    }

    public function productbycategory($id)
    {
        $categorys=Category::find($id);
        return view('user.productbycategory',['categorys'=>$categorys]);
    }

    public function storeproductcomment(Request $request)
    {
        productcomment::create([
            'your_name'=>$request->get('name'),
            'your_email'=>$request->get('email'),
            'your_comment'=>$request->get('comment')
        ]);
        $request->session()->flash('msg','thank you for comment');
        return redirect()->back();
    }
    public function showcomment()
    {
        $showcomment=ProductComment::orderBy('id','desc')->get();
        return view('user.productdetails',['showcomment'=>$showcomment]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
