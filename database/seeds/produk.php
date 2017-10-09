<?php

use App\Merk;
use App\Produk as Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class produk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++)
        {
            $produk = new Product;
            $produk->nama = "Produk ".uniqid();
            $produk->merk_id = Merk::inRandomOrder()->get()[0]->id;
            $produk->spesifikasi = $faker->paragraph;
            $produk->harga = rand(80000,1000000);
            $produk->gambar = json_encode([
                $faker->image('public/storage/images',400,300, null, false),
                $faker->image('public/storage/images',400,300, null, false),
            ]);
            $produk->save();
        }
    }
}
