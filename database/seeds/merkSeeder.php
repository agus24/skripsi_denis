<?php

use App\Merk;
use Illuminate\Database\Seeder;

class merkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i=0; $i < 10; $i++)
        {
            $data[] = [
                "nama" => "Merk $i"
            ];
        }
        Merk::insert($data);
    }
}
