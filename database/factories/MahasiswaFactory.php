<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nim = 2141720000 + $this->faker->numberBetween(1, 1000);
        $jurusan = array('Teknik Mesin', 'Teknologi Informasi', 'Teknik Elektro', 'Akuntansi', 'Teknik Kimia', 'Administarasi Niaga', 'Teknik Sipil');
        $index = $this->faker->numberBetween(1, count($jurusan)-1);
        $tingkat = $this->faker->numberBetween(1, 4);
        $huruf = strtoupper($this->faker->randomLetter());
        $jurusan_short = array('TM', 'TI', 'TE', 'AK', 'TK', 'AN', 'TS');
        $kelas = $jurusan_short[$index].' - '.$tingkat.$huruf;
        return [
            //
            'nim' => $nim,
            'nama' => $this->faker->name(),
            'kelas' => $kelas,
            'jurusan' => $jurusan[$index],
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'tanggal_lahir' => $this->faker->date()
        ];
    }
}
