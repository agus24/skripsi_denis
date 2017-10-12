<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Repo\ProdukRepo;
use App\Produk;

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
        return ProdukRepo::getApi(Produk::class);
    }
}
