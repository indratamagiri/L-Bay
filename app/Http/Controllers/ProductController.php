<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Product;
use App\Cart;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
use App\History;


class ProductController extends Controller
{

  public function index()
   {
     $products = Product::all();
     return view('product.index', compact('products'));
   }

  public function create()
  {
      return view('product.add');
  }

  public function store(Request $request)
    {

    $this->validate($request, [
    'name' => 'required',
    'harga' => 'required',
    'foto'  => 'required',
    'stock'  => 'required',
    'jenis_product' => 'required',
    ]);

// The blog post is valid, store in database...

    $product = new Product;
      $foto = $request->file('foto');
      $filename = time() . '.' . $foto->getClientOriginalExtension();
      Image::make($foto)->resize(300,300)->save( public_path('uploads/products/'. $filename));


    $product->foto = $filename;
    $product->name = $request->name;
    $product->stock = $request->stock;
    $product->jenis_product = $request->jenis_product;
    $product->harga = $request->harga;
    $product->save();
    return redirect('product');
}

public function show($id)
    {

  }



public function edit($id){

    $product= Product::find($id);

//dd($data);
 if(!$product){
  abort(404);
 }
   return view('product.edit')
          ->with('product',$product);
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
  $this->validate($request, [
  'name' => 'required',
  'harga' => 'required',
  'foto'  => 'required',
  'stuck'  => 'required',
  'jenis_product' => 'required',
  ]);

// The blog post is valid, store in database...

  $product = new Product;
    $foto = $request->file('foto');
    $filename = time() . '.' . $foto->getClientOriginalExtension();
    Image::make($foto)->resize(300,300)->save( public_path('uploads/products/'. $filename));


  $product->foto = $filename;
  $product->name = $request->name;
  $product->jenis_product = $request->jenis_product;
  $product->harga = $request->harga;
  $product->save();
  return redirect('product');
  }

  public function destroy($id)
     {
       $product= Product::find($id);
       unlink(public_path('uploads/products/'.$product->foto));
       $product->delete();
       return redirect('product');
     }

     public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
         $request->session()->save();
        return redirect()->route('home');
    }

    public function getReduceByOne($id){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      Session::put('cart', $cart);
      return redirect()->action('ProductController@cart');
    }

    public function getRemoveItem($id){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      Session::put('cart', $cart);
      return redirect()->action('ProductController@cart');
    }

    public function cart(){
      if (!Session::has('cart')){
        return view('cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function checkout(){
      if (!Session::has('cart')){
        return view('cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view ('buy', ['total'=>$total]);
    }

    public function postCheckout(Request $request){
      if (!Session::has('cart')){
        return redirect()->route('buy');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      Stripe::setApiKey('sk_test_kblAXzNWouz2lDYsg2PgssMM');
      try {
      $charge = Charge::create(array(
          "amount" => $cart->totalPrice/10000,
          "currency" => "usd",
          "source" => $request->input('stripeToken'), // obtained with Stripe.js
          "description" => "Charge for ella.robinson@example.com"
        ));
        $order = new History();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->payment_id =  $charge->id;


        Auth::user()->orders()->save($order);
      }catch (\Exception $e) {
         return redirect()->route('home')->with('error', $e->getMessage());
      }
      Session::forget('cart');
      return redirect()->route('home')->with('success', 'Succefully purchased product');
    }


}
