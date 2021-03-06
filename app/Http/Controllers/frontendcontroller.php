<?php

namespace App\Http\Controllers;

use App\DataTables\orderdatatable;
use App\Http\Requests\Customerdetailvalidation;
use App\Mail\mail as MailMail;
use App\Models\cart;
use App\Models\Customerdetail;
use App\Models\image;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use App\Models\watchbrand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use Stripe\Checkout\Session;
use Stripe;
use Stripe\Customer;
use PDF;
use Stripe\Order as StripeOrder;
use Symfony\Component\Console\Input\Input;

class frontendcontroller extends Controller
{
    
    // public function afterloginmaster(Request $request)
    // {
    //     $count=cart::where('user_id',Auth::user()->id)->count();
    //     return view('userlayout.afterloginmaster',compact('count'));
    // }
    
    public function allproduct()
    {
        $image = image::all()->groupBy('product_id');
        return view('allproduct', compact('image'));
    }

    public function viewallproduct()
    {
        $count=cart::where('user_id',Auth::user()->id)->count();
        $image = image::all()->groupBy('product_id');
        return view('viewallproduct', compact('image','count'));
    }

    public function productdetail(Request $request)
    {
        $product = product::where('id', $request->id)->first();
        $watch = watchbrand::where('id', $product->watch_id)->first();
        $imageDetails = image::select('image')->where('product_id', $request->id)->get();
        // $count = DB::table('carts')->where('product_id', $request->id)->count();
        $cart = cart::where('product_id', $request->id)->first();
        // $count = cart::where('product_id', $request->id)->first();
        $count=cart::where('user_id',Auth::user()->id)->count();
        return view('productdetail', compact('product', 'imageDetails', 'watch', 'count', 'cart'));
    }

    public function cartview(Request $request)
    {
        $count=cart::where('user_id',Auth::user()->id)->count();
        $cart = cart::where('user_id', Auth::user()->id)->get();
        return view('cartview', compact('cart','count'));
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
        $cart = cart::where('product_id', $request->pid)->where('user_id', Auth::user()->id)->first();
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
        $count=cart::where('user_id',Auth::user()->id)->count();
        $cart = cart::where('user_id', Auth::user()->id)->get();
        return view('checkout', compact('cart','count'));
    }

    public function stripe()
    {
        return view('stripe');
    }

    public function stripepayment(Request $request)
    {
        DB::beginTransaction();
        try {

            $a = explode('/', $request->exp_month);
            $exp_month = trim($a[0]);
            $exp_year = trim($a[1]);
            $cart = cart::where('user_id', Auth::user()->id)->get();
            $total = 0;
            foreach ($cart as $totalCart) {
                $total += $totalCart->price;
            }

            $stripe = new \Stripe\StripeClient(
                'sk_test_51KBGw9SFWtePUTo2aYHcyRbH79ZfN1LEa64xNuE2tW2smFglHV4Kil2gijPgYtMQobHHSQ221SYZMZnFWyxoTHcM00nBGSeZv6'
            );

            $sti = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'cvc' => $request->cvc,
                    'exp_month' => $exp_month,
                    'exp_year' => $exp_year
                ]
            ]);

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $invoice = Stripe\Charge::create([
                "amount" => $total * 100,
                "currency" => "inr",
                "source" => $sti->id,
                "description" => "This Payment Only Testing Purpose"
            ]);
            if ($invoice['amount_refunded'] == 0 && empty($invoice['failure_code']) && $invoice['paid'] == 1 && $invoice['captured'] == 1) {
                $order = cart::where('user_id', Auth::user()->id)->get();
                $invoice = generateInvoiceNumber(rand(100000, 999999));
                foreach ($order as $orders) {
                    $product = product::where('id', $orders->product_id)->first();
                    $total = 0;
                    $total += $orders->price;
                    $orderId = order::create([
                        'invoiceno' => $invoice,
                        'user_id' => Auth::user()->id,
                        'product_id' => $orders->product_id,
                        'quantity' => $orders->quantity,
                        'price' => $product->price,
                        'totalprice' => $total,
                    ]);
                }
                if (Auth::user()->refferal_id != null) {
                    $cashback = $total * 10 / 100;
                    User::where('id', Auth::user()->refferal_id)->update([
                        'wallet' => $cashback
                    ]);
                    User::where('id', Auth::user()->id)->update(['refferal_id' => null]);
                }

                if (Auth::user()->wallet <= $total) {
                    return back()->with('error', 'Your Wallet In Not Inuf Money');
                } else {
                    $manage = Auth::user()->wallet - $total;
                    User::where('id', Auth::user()->id)->update(['wallet' => $manage]);
                }
                // $count=cart::where('user_id',Auth::user()->id)->count();
                $address = Customerdetail::where('user_id', Auth::user()->id)->first();
                $view = order::where('user_id', Auth::user()->id)->where('invoiceno', $orderId->invoiceno)->get();
                Mail::to(Auth::user()->email)->send(new MailMail($view, $address));
            }
            cart::where('user_id', Auth::user()->id)->delete();
            DB::commit();
            return redirect()->route('orderview')->with('success', 'Payment Received successfully');
        } catch (\Throwable $e) {

            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function deletecart(Request $request)
    {
        $id = $request->id;
        cart::where('product_id', $id)->delete();
        return redirect()->route('cartview')->with('success', 'Product Delete successfully');
    }

    public function customerdetail(Customerdetailvalidation $request)
    {
        $add = new Customerdetail;
        $add->user_id = Auth::user()->id;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->address = $request->address;
        $add->save();
        return redirect()->route('stripe')->with('success', 'Customer Detail Add Successfully');
    }

    public function orderview(Request $request)
    {
        $count=cart::where('user_id',Auth::user()->id)->count();
        $exist = DB::table('orders')
            ->select('invoiceno', DB::raw('count(*) as total'))
            ->where('user_id', Auth::user()->id)
            ->groupBy('invoiceno')->get();
        return view('orderview', compact('exist','count'));
    }

    public function billview(Request $request, $id)
    {
        $count=cart::where('user_id',Auth::user()->id)->count();
        $address = Customerdetail::where('user_id', Auth::user()->id)->first();
        $view = order::select('*')->where('user_id', Auth::user()->id)->where('invoiceno', $id)->get();
        return view('billview', compact('view', 'address','count'));
    }

    public function generatepdf(Request $request, $id)
    {
        $address = Customerdetail::where('user_id', Auth::user()->id)->first();
        $view = order::select('*')->where('user_id', Auth::user()->id)->where('invoiceno', $id)->get();
        $data = [
            'view' => $view,
            'address' => $address,
        ];
        $pdf = PDF::loadview('generatepdf', compact('view', 'address'));
        return $pdf->stream('invoice.pdf');
    }
}