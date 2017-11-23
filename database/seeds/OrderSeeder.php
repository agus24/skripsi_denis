<?php

use App\Customer;
use App\Produk;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($urut=1; $urut <= 1000; $urut++)
        {
            $listID = collect([]);
            $total = 0;
            for ($i=0; $i < rand(1,10); $i++) {
                $produk = Produk::inRandomOrder()->get()[0];
                $qty = rand(1,5);
                while($listID->search($produk->id)) {
                    $produk = Produk::inRandomOrder()->get()[0];
                }
                DB::table('order_details')->insert([
                    "order_id" => $urut,
                    "produk_id" => $produk->id,
                    "harga" => $produk->harga,
                    "qty" => $qty
                ]);
                $listID->push($produk->id);
                $total += $produk->harga * $qty;
            }
            // $orderDate = Carbon::now()->format('Y-m-d');
            $date = Carbon::create(2016, 1, 28, 0, 0, 0)->addWeeks(rand(1,104));
            $orderDate = $date->format('Y-m-d');
            $approveDate = rand(0,1) == 1? $date->addDays(rand(5,10))->format('Y-m-d') : NULL;
            $sendDate = ($approveDate != NULL && rand(0,1) == 1) ? $date->addDays(rand(12,15))->format('Y-m-d') : NULL;
            $batal = rand(0,1);
            DB::table('orders')->insert([
                "no_invoice" => $this->generateInvoice($urut),
                "tanggal_order" => $orderDate,
                "tanggal_approve" => $approveDate,
                "tanggal_kirim" => $sendDate,
                "customer_id" => Customer::inRandomOrder()->get()[0]->id,
                "grand_total" => $total,
                "batal" => $batal,
            ]);

            if($batal == 1)
            {
                DB::table('order_cancels')->insert([
                    "order_id" => $urut,
                    "tanggal_batal" => Carbon::now()->addDays(rand(5,10))->format('Y-m-d'),
                    "alasan" => $faker->sentence
                ]);
            }
        }
    }

    private function generateInvoice($num)
    {
        $num = sprintf('%05d', $num);
        return "INV/$num";
    }
}
