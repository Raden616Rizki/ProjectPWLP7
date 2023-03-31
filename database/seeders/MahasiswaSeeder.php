<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'nim'=>'2141720001',
                'nama'=>'Aslan Bahri',
                'kelas'=>'TI - 2J',
                'jurusan'=>'Teknologi Informasi',
                'no_hp'=>'081xxxxxxxxx'
            ],
            [
                'nim'=>'2141720002',
                'nama'=>'Candra Dirajat',
                'kelas'=>'TI - 2J',
                'jurusan'=>'Teknologi Informasi',
                'no_hp'=>'082xxxxxxxxx'
            ],
            [
                'nim'=>'2141720002',
                'nama'=>'Edi Filayas',
                'kelas'=>'TI - 2J',
                'jurusan'=>'Teknologi Informasi',
                'no_hp'=>'083xxxxxxxxx'
            ]
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
