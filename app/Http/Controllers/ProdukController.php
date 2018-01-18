<?php

namespace App\Http\Controllers;

use App\Merk;
use App\Produk;
use App\Repo\ProdukRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        if(isset($_GET['search'])) {
            $data = ProdukRepo::withSearch($_GET['search'], $produk);
        } else {
            $data = ProdukRepo::get($produk);
        }
        return view('produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::all();
        return view('produk.create', compact('merks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "gambar" => "required",
            // "merk_id" => "required|numeric",
            "nama" => "required",
            "harga" => "required|numeric",
            "spesifikasi" => "required",
        ]);

        $produk = new Produk;
        $produk->gambar = $request->gambar;
        $produk->merk_id = 1;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->spesifikasi = $request->spesifikasi;
        $produk->save();

        foreach(json_decode($request->gambar, true) as $gambar){
            File::move(storage_path("app/public/tmp/".$gambar), storage_path("app/public/images/".$gambar));
        }
        return redirect('admin/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {

        $data = $produk;
        $merks = Merk::all();

        return view('produk.edit', compact('data','merks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            "gambar" => "required",
            // "merk_id" => "required|numeric",
            "nama" => "required",
            "harga" => "required|numeric",
            "spesifikasi" => "required",
        ]);

        $produk->gambar = $request->gambar;
        $produk->merk_id = 1;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->spesifikasi = $request->spesifikasi;
        $produk->save();
        foreach(json_decode($request->gambar, true) as $gambar){
            if(Storage::exists("public/tmp/".$gambar)) {
                // dd('masuk');
                File::move(storage_path("app/public/tmp/".$gambar), storage_path("app/public/images/".$gambar));
            }
        }
        $this->removeAllTmp();
        return redirect('admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('admin/produk');
    }

    public function image(Request $request)
    {
        $file = $request->file('file');
        $dest = storage_path('app/public/tmp');
        $fn = Carbon::now()->format("Y-m-d")."_".uniqid().".".$file->getClientOriginalExtension();
        $file->move($dest,$fn);
        return $fn;
    }

    private function removeAllTmp()
    {
        $files = Storage::files("public/tmp/");
        Storage::delete($files);
    }
}
