<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\matkul;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = DB::table('matkuls')->pluck('id');
        $faker = Faker::create('id_ID');
        $nipdosen = 10001; 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('dosens')->insert([
                'nip' => $nipdosen,
    			'nama_dosen' => $faker->name,
    			'id_matkul' => $faker->randomElement($matkul)
            ]);
            
            $nipdosen+=1;
 
    	}
    }
}
