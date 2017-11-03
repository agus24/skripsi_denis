<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $table = "user_carts";
    protected $primaryKey = "id";

    protected $fillable = ["customer_id","produk_id","qty"];

    public function add($user, $item, $qty)
    {
        $cart = $this->where('customer_id',$user->id)->where('produk_id',$item)->get();
        if($cart->count() > 0)
        {
            $cart->update('qty', $cart[0]->qty + $qty);
        }
        else
        {
            $this->create([
                "customer_id" => $user->id,
                "produk_id" => $item,
                "qty" => $qty
            ]);
        }
    }

    public function scopegetByUser($user)
    {
        return $this->join('produks', 'produks.id','user_carts.produk_id')
            ->where('customer_id', $user->get()[0]->id)
            ->select('user_carts.*','produks.nama as nama_produk')->get();
    }

    public function modifyCart($id, $qty)
    {
        $cart = $this->where('id', $id)->update(['qty' => $qty]);
    }
}
