<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Produk;
use App\Repo\ProdukRepo;
use App\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function aboutus()
    {
        return view('front.aboutus');
    }

    public function termcondition()
    {
        return view('front.termcondition');
    }

    public function addCart($id)
    {
        if(Auth::guard('customer')->guest()) {
            return Redirect::back()->withErrors(["ANDA HARUS LOGIN UNTUK MENAMBAHKAN PRODUK KE KERANJANG"]);
        }
        $cart = (new UserCart)->add(Auth::guard('customer')->user(), $id, 1);
        return redirect()->back();
    }

    public function modifyCart(Request $request, $id)
    {
        (new UserCart)->modifyCart($id,$request->qty);
        return Redirect::back();
    }

    public function removeCart($id)
    {
        UserCart::destroy($id);
        return Redirect::back();
    }

    public function checkout()
    {
        $cart = new UserCart;
        $cart = $cart->getAllCart(Auth::guard('customer')->user()->id);
        return view('front.checkout', compact('cart'));
    }

    public function processCart()
    {
        $order = new Order;
        $cart = new UserCart;
        $user = Auth::guard('customer')->user();
        $order->processFromCart($cart->getAllCart($user->id));
        $cart->removeByUserId($user->id);
        return redirect('/');
    }

    public function transaction()
    {
        $order = new Order;
        $user = Auth::guard('customer')->user();
        $order = $order->findCustomer($user->id);

        return view('front.transaction',compact('order'));
    }

    public function profile()
    {
        $user = Auth::guard('customer')->user();
        $edit = false;
        return view('front.profile', compact('user','edit'));
    }

    public function profileEdit()
    {
        $user = Auth::guard('customer')->user();
        $edit = true;
        return view('front.profile', compact('user','edit'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required|same:password_confirmation",
            "password_confirmation" => "required",
            "nama" => "required",
            "alamat" => "required",
            "telp" => "required",
        ]);
        $user = Auth::guard('customer')->user();

        $customer = Customer::find($user->id);
        $customer->password = bcrypt($request->password);
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->telp = $request->telp;
        $customer->save();

        return redirect('user/profile');
    }
}
