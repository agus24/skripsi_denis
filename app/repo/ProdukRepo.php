<?php

namespace App\Repo;

use App\Produk;

class ProdukRepo
{
    public static function get(Produk $produk)
    {
        return $produk->join('merks','produks.merk_id','merks.id')
                      ->select('produks.*','merks.nama as nama_merk')
                      ->paginate(15);
    }

    public static function getApi(Produk $produk)
    {
      return $produk->join('merks','produks.merk_id','merks.id')
                    ->select('produks.*','merks.nama as nama_merk')
                    ->get();
    }
}
