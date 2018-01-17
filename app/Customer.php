<?php

namespace App;

use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Customer extends Authenticatable
{

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'telp'
    ];

    public function scopecheckLogin($query, $email, $password)
    {
        $data = $query->where('email', $email)->get();
        $response = ["status" => false, "data" => [] ];
        if($data->count() > 0) {
            if(Hash::check($password, $data[0]->password)) {
                $response['status'] = true;
                $response['data'] = $data[0];
            }
        }
        return $response;
    }

    public function getPembelianTerbanyak($id,$periode)
    {
        return DB::table('orders')
            ->join('order_details', 'orders.id','order_details.order_id')
            ->join('produks','produks.id','order_details.produk_id')
            ->join('customers','customers.id','orders.customer_id')
            ->where('customer_id', $id)
            ->where('batal','<>',1)
            ->whereBetween('tanggal_order', $periode)
            ->selectRaw('produk_id, sum(qty) as jumlah_beli, produks.nama as nama_produk, orders.tanggal_order, customer_id, customers.nama as nama_customer')
            ->groupBy('produk_id')
            ->orderByRaw("count(produk_id) desc")
            ->first();
    }
}
