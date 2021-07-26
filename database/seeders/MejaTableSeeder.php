<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($j = 1; $j <= getMaxRow(); $j++) {
            for ($i = 1; $i <= getJumlahMeja($j); $i++) {
                DB::table('mejas')->insert([
                    'restoran_id' => $j,
                    'link' => "http://mofoods.id/".getNama($j)."/meja/".$i,
                ]);
            }
        }
    }
}

function getNama($id)
{
    $results = app('db')->select("SELECT * FROM restorans where id = ".$id);
    foreach ($results as $get) {
        if($get->id == $id){
            return $get->nama;
        }
    }
}

function getJumlahMeja($id)
{
    $results = app('db')->select("SELECT * FROM restorans where id = ".$id);
    foreach ($results as $get) {
        if($get->id == $id){
            return $get->jumlah_meja;
        }
    }
}

function getMaxRow()
{
    return app('db')->select("SELECT max('id') FROM restorans");
}
