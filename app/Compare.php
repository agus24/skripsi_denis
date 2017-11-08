<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Impl\CompareInterface;

class Compare extends Model implements CompareInterface
{
    /**
     * set Produk ke DB
     * @param int $customer_id
     * @param int $produk_id
     */
    public function setProduk($customer_id, $produk_id)
    {
        $data = $this->where('customer_id', $customer_id);
        if($data->get()->count() > 0) {
            if($data->get()[0]->produk2 != 0 || $data->get()[0]->produk1 == $produk_id)
            {
                return false;
            }
            $data->update(["produk2" => $produk_id]);
        }
        else {
            $data->insert([
                "produk1" => $produk_id,
                "produk2" => 0,
                "customer_id" => $customer_id
            ]);
        }

        return true;
    }

    /**
     * ambil data yg uda di compare dari db
     * @param  int $customer_id
     * @return laravel collection
     */
    public function showCompared($customer_id)
    {
        return $this->where('customer_id', $customer_id)
                    ->join('produks as a','a.id','compares.produk1')
                    ->join('produks as b','b.id','compares.produk2')
                    ->select('compares.*',
                                'a.nama         as produk1_nama',
                                'a.spesifikasi  as produk1_spesifikasi',
                                'a.harga        as produk1_harga',
                                'a.gambar        as produk1_gambar',
                                'b.nama         as produk2_nama',
                                'b.spesifikasi  as produk2_spesifikasi',
                                'b.harga        as produk2_harga',
                                'b.gambar        as produk2_gambar'
                            )
                    ->get()->map(function($value, $key) {
                        $value->produk1_gambar = asset("storage/images/". json_decode($value->produk1_gambar, true)[0]);
                        $value->produk2_gambar = asset("storage/images/". json_decode($value->produk2_gambar, true)[0]);
                        return $value;
                    });
    }

    /**
     * Hapus Semua Compare Dari Customer ID
     * @param  int $customer_id
     */
    public function clearCompare($customer_id)
    {
        $this->where('customer_id' , $customer_id)->delete();
    }
}
