<?php

namespace App\Http\Controllers;

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

    public function removeCart($id) {
        UserCart::rm($id);
    }
}
