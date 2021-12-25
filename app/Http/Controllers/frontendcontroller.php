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
        return view('productdetail', compact('product', 'imageDetails', 'watch'));
    }

    public function cartview(Request $request, $id)
    {
        $product = product::where('id', $id)->first();
        $watch = watchbrand::where('id', $product->watch_id)->first();
        $imageDetails = image::select('image')->where('product_id', $request->id)->first();
        $cart = cart::where('product_id', $request->id)->first();
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
        // $count = DB::table('cart')->where('product_id', $request->id)->count();
        // return response()->json(['success' => '1', 'data' => $count, 'id' => $request->id]);
    }

    public function deletecart(Request $request)
    {
        $id = $request->id;
        $query = cart::find($id)->delete();
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Cart-Product Has Been Deleted']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something Wrong']);
        }
    }
}
