<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

use App\Product;
class UserController extends Controller
{
    //

    public function profile()
    {
      return view('profile', array('user' => Auth::user()));
    }


    public function update_avatar(Request $request){

      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save( public_path('uploads/avatars/'. $filename));

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }
      return view('profile', array('user' => Auth::user()));
    }


    public function update_dompet(Request $request){

          $user = Auth::user();
          $user->dompet = $user->dompet+$request->dompet;
          $user->save();

          return view('profile', array('user' => Auth::user()));

    }

  public function history(){
    $order = Auth::user()->orders;
    $order->transform(function($order, $key){
      $order->cart = unserialize($order->cart);
      return $order;
    });
    return view('history', ['orders' => $order]);
  }

}
