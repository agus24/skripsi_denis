<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = "id";

    protected $fillable = [
        "no_invoice",
        "tanggal_order",
        "tanggal_approve",
        "tanggal_kirim",
        "customer_id",
        "grand_total",
        "batal"
    ];

    public function processFromCart($cart)
    {
        $dataDetail = [];
        $data = $this->generateData($cart);
        $this->create($data['head']);
        DB::table('order_details')->insert($data['det']);
    }

    public function findCustomer($customer_id)
    {
        return $this->mapOrderCustomer($this->where('customer_id', $customer_id)->get());
    }

    public function findDetail($id)
    {
        return DB::table('order_details')
                ->where('order_id', $id)
                ->join('produks','produks.id','order_details.produk_id')
                ->select('order_details.*','produks.nama')
                ->get()
                ->map(function($value) {
                    $value->sub_total = number_format($value->harga * $value->qty);
                    $value->harga = number_format($value->harga);
                    return $value;
                });
    }

    private function mapOrderCustomer($data)
    {
        return $data
            ->map(function($value, $key) {
                $statusText = "Sudah Di Kirim";
                $status = 2;
                if(!$value->tanggal_approve) {
                    $statusText = "Belum Di Approve";
                    $status = 0;
                } elseif(!$value->tanggal_kirim) {
                    $statusText = "Belum Di Kirim";
                    $status = 1;
                }
                $value->status = $status;
                $value->statusText = $statusText;
                return $value;
            });
    }

    private function generateInvoice()
    {
        $last = $this->orderBy('id','desc')->first()->no_invoice;
        $last = explode("/", $last);
        $last = $last[0]."/".sprintf("%05s", $last[1]+1);
        return $last;
    }

    private function generateData($cart)
    {
        $total = 0;
        foreach($cart as $key => $value)
        {
            $dataDetail[] = [
                "produk_id" => $value->produk_id,
                "harga" => $value->harga,
                "qty" => $value->qty,
                "order_id" => $this->orderBy('id','desc')->first()->id+1
            ];
            $total += $value->harga * $value->qty;
        }

        $data = [
            "no_invoice" => $this->generateInvoice(),
            "tanggal_order" => Carbon::now()->format('Y-m-d'),
            "customer_id" => Auth::guard('customer')->user()->id,
            "grand_total" => $total
        ];

        return [
            "head" => $data,
            "det" => $dataDetail
        ];
    }
}
