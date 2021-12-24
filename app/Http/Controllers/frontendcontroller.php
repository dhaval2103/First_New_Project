<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\product;
use App\Models\watchbrand;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
}
