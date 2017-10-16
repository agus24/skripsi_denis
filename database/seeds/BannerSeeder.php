<?php

use App\Banner;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
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
            $banner = new Banner;
            $banner->gambar = $faker->image('public/storage/images/banner',400,300, null, false);
            $banner->status = rand(0,1);
            $banner->save();
        }
    }
}
