<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestoranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {
            DB::table('restorans')->insert([
                'email' => $faker->email,
                'password' => $faker->password,
                'jumlah_meja' => $faker->numberBetween(5, 15),
                'nama' => $faker->text,
                'no_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}
