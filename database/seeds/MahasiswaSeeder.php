<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Matkul;
use App\Dosen;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $matkul = DB::table('matkuls')->pluck('id');
        $dosen = DB::table('dosens')->pluck('id');
        $faker = Faker::create('id_ID');
        $nrpmahasiswa = 9001; 
    	for($i = 1; $i <= 1000; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('mahasiswas')->insert([
                'nrp' => $nrpmahasiswa,
                'nama_siswa' => $faker->name,
                'alamat_siswa' => $faker->address,
    			'id_dosen' => $faker->randomElement($dosen)
            ]);
            
            $nrpmahasiswa+=1;
 
    	}
    }
}
