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
        $menu = array(
            array('Nasi Goreng', 'Nasi Goreng Seafood', 'Nasi goreng + udang + cumi', 15000, 'https://www.sahabatufs.com/img/news/fd98caedd6f9c64bc40fd2ba24b8133007.%20UFS_Header%20Image_August2019.jpg'),
            array('Nasi Goreng', 'Nasi Goreng Mawut', 'Nasi goreng + mie + sosis', 16000, 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&dl=christopher-alvarenga-rQX9eVpSFz8-unsplash.jpg'),
            array('Nasi Goreng', 'Nasi Goreng Arang', 'Nasi goreng yang dimasak menggunakan arang', 17000, 'https://www.jejakpiknik.com/wp-content/uploads/2018/12/Nasi-Goreng-Mas-Yono-630x380.jpg'),
            array('Bakso', 'Bakso Keju', 'Bakso keju + kuah', 18000, 'https://i1.wp.com/resepkoki.id/wp-content/uploads/2020/02/Resep-Bakso-Keju.jpg?fit=550%2C600&ssl=1'),
            array('Bakso', 'Bakso Jamur', 'Bakso jamur + kuah', 19000, 'https://bisnisukm.com/uploads/2011/08/olahan-jamur.jpg'),
            array('Bakso', 'Bakso Beranak', 'Bakso beranak + kuah', 20000, 'https://cf.shopee.co.id/file/b24677dd91b7dc10b34b100936a6f8bb'),
            array('Bakso', 'Bakso Urat', 'Bakso urat + kuah', 21000, 'https://asset.kompas.com/crops/4aqOaU_1HDJzJZDlhtm1mFQFmSM=/0x0:698x465/750x500/data/photo/2021/01/08/5ff86f55cf2e4.jpg'),
            array('Bakso', 'Bakso Puyuh', 'Bakso puyuh + kuah', 22000, 'https://cdn.idntimes.com/content-images/post/20191111/58822351-131961287894346-2210575527282014114-n-b64710377131e2f167ed58c495ebdcf4_600x400.jpg'),
            array('Mie', 'Mie Goreng Indomie', 'Indomie goreng mantab', 10000, 'https://assets-pergikuliner.com/jYEYvwnIj4Oy8ieI48ljsxYjjnY=/fit-in/1366x768/smart/filters:no_upscale()/https://assets-pergikuliner.com/uploads/image/picture/1004664/picture-1532413224.jpg'),
            array('Mie', 'Mie Kuah', 'Mie goreng + kuah', 12000, 'https://i.pinimg.com/originals/bb/c8/09/bbc80910e1a0c29593cd211a9b24c2d9.png'),
            array('Susu', 'Susu soda gembira', 'Susu segar + soda + sirup', 8000, 'https://statics.indozone.news/content/2019/05/28/gmszJr/t_5cecf455c1a3a_700.jpg'),
            array('Susu', 'Susu Coklat', 'Susu segar + coklat leleh', 5000, 'https://asset.kompas.com/crops/xfOvjZU6XewHDx--a5nR2k1gkYQ=/3x0:700x465/750x500/data/photo/2020/10/27/5f97e61acd7c4.jpg'),
            array('Susu', 'Susu Segar', 'Susu segar murni dari aslinya', 13000, 'https://cdn.yummy.co.id/content-images/images/20200609/JuvmDxLfY9UP0L0rQLTXrTKdMJpQEIr7-31353931363834323035d41d8cd98f00b204e9800998ecf8427e_800x800.jpg'),
        );
        for ($i = 0; $i < sizeof($menu); $i++) {
            DB::table('menus')->insert([
                'kategori_menu' => $menu[$i][0],
                'nama' => $menu[$i][1],
                'harga' => $menu[$i][3],
                'deskripsi' => $menu[$i][2],
                'gambar' => $menu[$i][4],
                'isRecommended' => ($i % 10 == 0) ? 1 : 0,
                'isAvailable' => ($i % 3 == 0) ? rand(0, 1) : 1,
            ]);
        }
    }
}
