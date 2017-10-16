<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Customer;
use App\Produk;
use App\Repo\ProdukRepo;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function loginCustomer(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $password = $data['password'];
        $customer = Customer::checkLogin($email, $password);
        if($customer['status']) {
            return response()->json($customer, 200);
        } else {
            return response()->json($customer, 403);
        }

    }

    public function getProduk(Request $request)
    {
        return ProdukRepo::getApi(new Produk);
    }

    public function getProdukMerk(Request $request, $merk)
    {
        return ProdukRepo::getWithMerk(new Produk, $merk);
    }

    public function getBanner(Request $request)
    {
        $banner = Banner::where('status',1)->get()->map(function($value, $key) {
            $value->gambar = asset('storage/images/banner/'. $value->gambar);
            return $value;
        });
        return $banner;
    }
}
