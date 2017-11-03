<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Repo\ProdukRepo;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $produks = ProdukRepo::getAll(new Produk);
        return view('front.index', compact('produks'));
    }
}
