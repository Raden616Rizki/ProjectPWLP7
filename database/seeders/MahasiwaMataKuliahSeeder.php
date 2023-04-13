<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiwaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nilai = [
            [
                'mahasiswa_id' => 2141720001,
                'matakuliah_id' => 1,
                'nilai' => 82,
            ],
            [
                'mahasiswa_id' => 2141720001,
                'matakuliah_id' => 2,
                'nilai' => 90,
            ],
            [
                'mahasiswa_id' => 2141720001,
                'matakuliah_id' => 3,
                'nilai' => 79,
            ],
            [
                'mahasiswa_id' => 2141720001,
                'matakuliah_id' => 4,
                'nilai' => 87,
            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($nilai);
    }
}
