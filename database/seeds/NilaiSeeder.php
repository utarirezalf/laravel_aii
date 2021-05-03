<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 20; $i++)
        {
    	    // insert data ke table pegawai menggunakan Faker
    		DB::table('nilai')->insert([
    			'nama' => $faker->name,
    			'nim' => $faker->nim,
    			'jurusan' => $faker->jurusan,
    			'kampus' => $faker->kampus,
    			'nama_pemb' => $faker->nama_pemb
    		]);
        }
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
        

    }
}
