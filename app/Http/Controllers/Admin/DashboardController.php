<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\userdatatable;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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

    public function addproduct(Request $request)
    {
        $input = $request->all();
        if ($request->file('image')) {
            $imagename = $request->file('image');
            $destinationPath = 'images/';
            $profileImage = time() . "." . $imagename->extension();
            $imagename->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;

            $add = new product();
            $add->user_id = $request->userid;
            $add->title = $request->title;
            $add->description = $request->description;
            $add->price = $request->price;
            $add->image = $input['image'];
            $add->save();
            return response()->json('1');
        }
    }

    public function productdetail(Request $request)
    {
        $query = product::where('user_id', $request->id)->get();
        return view('admin.productdetail', compact('query'));
    }
}
