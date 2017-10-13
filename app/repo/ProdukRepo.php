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
      $data = $produk->join('merks','produks.merk_id','merks.id')
                    ->select('produks.*','merks.nama as nama_merk')
                    ->get();
      $data = $data->map(function($value, $key) {
          $gambar = json_decode($value->gambar, true);
          foreach ($gambar as $key => $value) {
            $gambar[$key] = asset("storage/images/".$value);
          }
          $value->gambar = json_encode($gambar);
          return $value;
      });
      return $data;
    }
}
