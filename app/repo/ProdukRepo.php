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

    public static function getAll(Produk $produk)
    {
        return $produk->join('merks','produks.merk_id','merks.id')
                      ->select('produks.*','merks.nama as nama_merk')
                      ->get()
                      ->map(function($value , $key) {
                        $value->hargaText = number_format($value->harga);
                        $value->gambar = json_decode($value->gambar,true)[0];
                        return $value;
                      });
    }

    public static function getApi(Produk $produk)
    {
        return static::getData($produk);
    }

    public static function getWithMerk(Produk $produk, $merk_id)
    {
        return static::getData($produk, $merk_id);
    }

    public static function getData($produk, $merk = null)
    {
        $data = $produk->join('merks','produks.merk_id','merks.id')
                      ->select('produks.*','merks.nama as nama_merk');
        if($merk != null)
        {
          $data = $data->where("merk_id", $merk);
        }

        $data = $data->get()->map(function($value, $key) {
            $gambar = json_decode($value->gambar, true);
            foreach ($gambar as $key => $val) {
              $gambar[$key] = asset("storage/images/".$val);
            }
            $value->gambar = json_encode($gambar);
            return $value;
        });
        return $data;
    }

    public static function produk($produk, $id)
    {
      $produk = $produk->find($id);
      $gambar = json_decode($produk->gambar, true);
      foreach ($gambar as $key => $val) {
        $gambar[$key] = asset("storage/images/".$val);
      }
      $produk->gambar = $gambar;
      return $produk;
    }
}
