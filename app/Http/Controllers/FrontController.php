<?php

namespace App\Http\Controllers;

use App\Compare;
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
        $carts = $cart->getAllCart(Auth::guard('customer')->user()->id);
        // dd($cart[0]);
        return view('front.checkout', compact('carts'));
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

    public function produkDetail($id)
    {
        $produk = ProdukRepo::produk(new Produk, $id);
        return view('front.produk.detail', compact('produk'));
    }

    public function compare($id)
    {
        if(Auth::guard('customer')->guest())
        {
            return Redirect::back()->withErrors(["ANDA HARUS LOGIN UNTUK MELAKUKAN PERBANDINGAN PRODUK"]);
        }

        $compare = new Compare;
        if(!$compare->setProduk(Auth::guard('customer')->user()->id, $id))
        {
            return Redirect::back()->withErrors(["ANDA HANYA BISA MEMBANDINGKAN 2 BARANG ATAU BARANG YANG ANDA PILIH SUDAH TERDAFTAR DI LIST PEMBANDING KAMI"]);
        }
        return redirect()->back();
    }

    public function dataCompare()
    {
        if(Auth::guard('customer')->guest())
        {
            return Redirect::back()->withErrors(["ANDA HARUS LOGIN UNTUK MELIHAT PERBANDINGAN PRODUK"]);
        }
        $compare = new Compare;
        $data = $compare->showCompared(Auth::guard('customer')->user()->id);
        $data = $data->count() > 0 ? $data[0] : collect([]);
        return view('front.userCompare', compact('data'));
    }

    public function removeCompare()
    {
        if(Auth::guard('customer')->guest())
        {
            return Redirect::back()->withErrors(["ANDA HARUS LOGIN UNTUK MELIHAT PERBANDINGAN PRODUK"]);
        }

        $compare = new Compare;
        $compare->clearCompare(Auth::guard('customer')->user()->id);
        return redirect()->back();
    }

    public function userRegister(Request $request)
    {
        $this->validate($request, [
            "user_password" => "required|same:confirmation_password",
            "user_email" => "required|email|unique:customers,email",
            "name" => "required",
            "address" => "required",
            "phone_number" => "required"
        ]);

        $cust = new Customer;
        $cust->nama = $request->name;
        $cust->email = $request->user_email;
        $cust->password = bcrypt($request->user_password);
        $cust->alamat = $request->address;
        $cust->telp = $request->phone_number;
        $cust->status = 1;
        $cust->save();

        Auth::guard('customer')->loginUsingId($cust->id, true);
        return redirect()->back();
    }
}
