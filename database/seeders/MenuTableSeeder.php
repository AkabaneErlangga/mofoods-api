<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            DB::table('menus')->insert([
                'kategori_menu' => rand(0, 5) == 0 ? "Nasi Goreng" : (rand(0, 5) == 1 ? "Mie Goreng" : (rand(0, 5) == 2 ? "Bakso" : (rand(0, 5) == 3 ? "Minuman Kaleng" : "Camilan"))),
                'nama' => ($i % 4 == 0) ? Str::random(10) : Str::random(20),
                'harga' => $faker->numberBetween(10000, 30000),
                'deskripsi' => Str::random(15),
                'gambar' => 'https://picsum.photos/250?image=' . ($i + 50),
                'isRecommended' => ($i % 10 == 0) ? 1 : 0,
                'isAvailable' => ($i % 3 == 0) ? rand(0, 1) : 1,
            ]);
        }
    }
}
