<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\image;
use App\Models\product;
use App\Models\User;
use App\Models\watchbrand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class frontendcontroller extends Controller
{
    public function allproduct()
    {
        $image = image::all()->groupBy('product_id');
        return view('allproduct', compact('image'));
    }

    public function viewallproduct()
    {
        $image = image::all()->groupBy('product_id');
        return view('viewallproduct', compact('image'));
    }

    public function productdetail(Request $request)
    {
        $product = product::where('id', $request->id)->first();
        $watch = watchbrand::where('id', $product->watch_id)->first();
        $imageDetails = image::select('image')->where('product_id', $request->id)->get();
        // $count = DB::table('carts')->where('product_id', $request->id)->count();
        $cart = cart::where('product_id', $request->id)->first();
        $count = cart::where('product_id', $request->id)->first();
        return view('productdetail', compact('product', 'imageDetails', 'watch', 'count', 'cart'));
    }

    public function cartview(Request $request, $id)
    {
        $product = product::where('id', $id)->first();
        $watch = watchbrand::where('id', $product->watch_id)->first();
        // $imageDetails = image::select('image')->where('product_id', $request->id)->first();
        $imageDetails = image::all()->groupBy('product_id');
        $cart = cart::where('user_id', Auth::user()->id)->get();
        return view('cartview', compact('product', 'imageDetails', 'watch', 'cart'));
    }

    public function addtocart(Request $request)
    {
        $product = product::where('id', $request->id)->first();
        $user = Auth::user()->id;
        $exist = cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        if ($exist) {
            $qty = $exist->quantity += 1;
            $totalPrice = $qty * $exist->price;
            $arr = [
                'quantity' => $qty,
                'price' => $totalPrice
            ];
            cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->update($arr);
        } else {
            $add = new cart;
            $add->user_id = Auth::user()->id;
            $add->product_id = $request->id;
            $add->quantity = '1';
            $add->price = $product->price;
            $add->save();
        }
        return response()->json('1');
    }

    public function selectqty(Request $request)
    {

        $quantity = 0;
        $totalPrice = 0;
        $product = product::where('id', $request->pid)->first();
        $cart = cart::where('product_id', $request->pid)->first();
        if ($cart) {

            $quantity = $request->id;
            $totalPrice = $quantity * $product->price;

            $arr = [
                'quantity' => $quantity,
                'price' => $totalPrice
            ];
            cart::where('product_id', $request->pid)->update($arr);
        } else {
            $add = new cart;
            $add->user_id = Auth::user()->id;
            $add->quantity = $request->id;
            $add->product_id = $request->pid;
            $add->price = $product->price;
            $add->save();
        }
        $price = cart::where('product_id', $request->pid)->first();

        return response()->json(['data' => $price]);
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function stripe()
    {
        return view('stripe');
    }

    // public function stripepayment(Request $request)
    // {
    //     stripe\stripe::setApiKey(env('STRIPE_SECRET'));
    //     stripe\charge::create([
    //         "amount" => 100 * 100,
    //         "currency" => "IN",
    //         "source" => $request->stripeToken,
    //         "description" => "This Payment Only Testing Purpose"
    //     ]);
    //     Session::flash('Success', 'Payment Successfully');
    //     return back();
    // }
}
