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
                'no_hp'=>'081xxxxxxxxx',
                'email'=>'abe31hari@gmail.com',
                'tanggal_lahir'=>'2001-12-31'
            ],
            [
                'nim'=>'2141720002',
                'nama'=>'Candra Dirajat',
                'kelas'=>'TI - 2J',
                'jurusan'=>'Teknologi Informasi',
                'no_hp'=>'082xxxxxxxxx',
                'email'=>'moonsoonata@gmail.com',
                'tanggal_lahir'=>'2003-11-11'
            ],
            [
                'nim'=>'2141720003',
                'nama'=>'Edi Filayas',
                'kelas'=>'TI - 2J',
                'jurusan'=>'Teknologi Informasi',
                'no_hp'=>'083xxxxxxxxx',
                'email'=>'Edi3Filayas@gmail.com',
                'tanggal_lahir'=>'2001-12-29'
            ]
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
