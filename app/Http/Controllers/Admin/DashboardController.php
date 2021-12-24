<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\productdatatable;
use App\DataTables\userdatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\productvalidation;
use App\Models\image;
use App\Models\product;
use App\Models\watchbrand;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userdetail(userdatatable $request)
    {
        return $request->render('admin.userdetail');
    }

    public function edituser(Request $request)
    {
        $query = User::where('id', $request->id)->first();
        return response()->json($query);
    }

    public function updateuser(Request $request)
    {
        $input = $request->all();
        if ($input['id']) {
            $arr = [
                'name' => $request->uname,
                'email' => $request->email,
            ];
            User::where('id', $input['id'])->update($arr);
            return response()->json('1');
        }
    }

    public function deleteuser(Request $request)
    {
        $id = $request->id;
        $query = User::find($id)->delete();
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Something Wrong']);
        }
    }

    public function productdetail(productdatatable $request)
    {
        return $request->render('admin.productdetail');
    }

    public function addproduct(Request $request)
    {
        $watchbrand = watchbrand::all();
        return view('admin.addproduct', compact('watchbrand'));
    }

    public function addwatchbrand()
    {
        return view('admin.addwatchbrand');
    }

    public function insertwatch(Request $request)
    {
        $add = new watchbrand;
        $add->name = $request->watch;
        $add->save();
        return redirect()->route('admin.addproduct');
    }

    public function productinsert(productvalidation $request)
    {
        $add = new product;
        $add->watch_id = $request->watchbrand;
        $add->title = $request->title;
        $add->description = $request->description;
        $add->price = $request->price;
        $add->save();

        $input = $request->all();
        if ($request->file('image')) {
            $files = [];
            foreach ($request->file('image') as $input) {
                $destinationPath = 'images/';
                $profileImage = time() . '.' . $input->extension();
                $input->move($destinationPath, $profileImage);
                image::create([
                    'product_id' => $add->id,
                    'image' => $profileImage
                ]);
            }
        }

        // $img = new image;
        // $img->image = implode(',', $files);
        // $add->images()->save($img);

        return redirect()->route('admin.productdetail');
    }

    public function productedit(Request $request)
    {
        $watchbrand = watchbrand::all();
        $query = DB::table('products')->where('id', $request->id)->first();
        $img = image::select('image')->where('product_id', $request->id)->get();
        return view('admin.productedit', compact('query', 'watchbrand', 'img'));
    }

    public function productupdate(productvalidation $request)
    {
        $files = $request->all();
        if ($image = $request->file('image')) {
            $files = [];
            foreach ($request->file('image') as $input) {
                $destinationPath = public_path('images');
                $profileImage = date('YmdHis') . "." . $input->getClientOriginalExtension();
                $input->move($destinationPath, $profileImage);
                image::create([
                    'product_id' => $request->id,
                    'image' => $profileImage
                ]);
            }
        }
        if ($request->id) {
            $arr = [
                'watch_id' => $request->watchbrand,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price
            ];
            product::where('id', $request->id)->update($arr);
        }
        return redirect()->route('admin.productdetail');
        // return response()->json('1');
    }


    public function productdelete(Request $request)
    {
        // $imagename = product::find($request->id);
        // unlink('images/' . $imagename->getRaworiginal('image'));
        // product::where('id', $imagename->id)->delete();
        // return response()->json('1');

        // $b = product::with('image')->find($request->id);
        // $image = explode(',', $b);
        // foreach ($b->image as $images) {
        //     if ($request->image == $images) {
        //         unlink('images/' . $request->image->getRaworiginal('image'));
        //         product::where('id', $request->id)->delete();
        //     }
        // }
        // return response()->json('1');

        $id = $request->id;
        $query = product::find($id)->delete();
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something Wrong']);
        }
    }

    public function productview(Request $request)
    {
        $product = DB::table('products')->where('id', $request->id)->first();
        $viewimg = image::select('image')->where('product_id', $request->id)->get();
        return view('admin.productview', compact('product', 'viewimg'));
    }

    public function cartview(Request $request, $id)
    {
        $cart = product::where('id', $id)->first();
        return view('admin.cartview', compact('cart'));
    }

    public function deleteimage(Request $request)
    {
        // $a = product::find($request->id);
        $b = image::where('id', $request->id);
        $image = explode(',', $b);
        foreach ($image as $images) {
            if ($request->image == $images) {
                unlink('images/' . $request->image->getRaworiginal('image'));
            }
        }
        return response()->json('1');
    }
}
