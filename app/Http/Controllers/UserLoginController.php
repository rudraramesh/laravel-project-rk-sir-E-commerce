<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Category;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfileUpdate;

class UserLoginController extends Controller
{
   public function userlogin(Request $request)
   {
    if (Auth::guard('myweb')->attempt(['email' => $request->email, 'password'=>$request->password], $request->remember)) {
        return redirect()->intended(route('homepage'));
    }
    return redirect()->back()->with('error','email or password invalid !');
   }

   public function userlogout()
   {
    Auth::guard('myweb')->logout();
    return redirect()->route('homepage');
   }

   public function userprofile($id)
   {
    $show=Customer::find($id);
    $showcategory=Category::orderBy('id','asc')->get();
    return view('user.userprofile',compact('showcategory','show'));
   } 

   public function userprofileupdate(profileUpdateRequest $request)
   {
    $cover=null;
        if ($request->hasFile('cover')) {
            $file=$request->file('cover');
            $cover=mt_rand(10001,9999999).'_'.$file->
            getClientOriginalName();
            $file->move('user/upload/coverimage',$cover);
        }

    $image=null;
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $image=mt_rand(10001,9999999).'_'.$file->
            getClientOriginalName();
            $file->move('user/upload/profileimage',$image);
        }
        UserProfileUpdate::create([
        'address'=>$request->get('address'),
        'phone'=>$request->get('phone'),
        'bio'=>$request->get('bio'),
        'dob'=>$request->get('dob'),
        'profile_image'=>$image,
        'user_id'=>$request->get('user_id')

        ]);
        $request->session()->flash('message','profile updated successfully');
        return redirect()->back();
   }

   public function editprofile($id)
   {
    $show=Customer::find($id);
    $showcategory=Category::orderBy('id','asc')->get();
    return view('user.editprofile',compact('showcategory','show'));
   }

    public function updateprofile(Request $request,$id)
        {
            $detail = Customer::find($id);

            if($request->hasFile('cover')){
            $file=$request->file('cover');
            $cover=mt_rand(10001,999999).'_'.$file->getClientOriginalName();
            $file->move('user/upload/coverimage/',$cover);
            if($detail->profiles->cover){
                unlink('user/upload/coverimage/'.$detail->profiles->cover);
            }
            $detail->profiles()->update(['cover_image'=>$cover]);
          }
            $detail = Customer::find($id);

            if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(10001,999999).'_'.$file->getClientOriginalName();
            $file->move('user/upload/profileimage/',$image);
            if($detail->profiles->image){
                unlink('user/upload/profileimage/'.$detail->profiles->image);
            }

            $detail->profiles()->update(['profile_image'=>$image]);

        }
        $detail->update([
            'name' =>$request->get('name'),

        ]);
        $detail->profiles()->update([

            'address'=>$request->get('address'),
            'phone'=>$request->get('phone'),
            'dob'=>$request->get('dob'),


        ]);
        $request->session()->flash('success','Profile Updated successfully');
        return redirect()->route('userprofile',$id);
        }
}
