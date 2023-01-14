<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use App\Models\Laporan;
use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create('id_ID');
       $faker->seed(123);
        $prodi =["Teknik Informatika","Sistem Informasi"];
        $status=["Laporan Minggu ke-1","Laporan Minggu ke-2","Laporan Minggu ke-3","Laporan Minggu ke-4","Laporan Minggu ke-5",];
        $mitra =["PT.Tokopedia","PT.Shopee","PT.Amazon"];
        $posisi =["Softwere Engginer","Web Development","UI/UX Design"];
        $file = ["a.pdf","b.pdf"];
        
        for ($i=0; $i < 10; $i++) { 
            Mahasiswa::create([
                'npm' => $faker->unique()->numerify('20###########'),
                'nama' => $faker->firstName." ".$faker->lastName,
                'prodi' => $faker->randomElement($prodi),
                'ipk' => $faker->randomFloat(2,2,4)
            ]);
       }
       for ($i=0; $i < 10; $i++) { 
       Laporan::create([
        'status_laporan' =>$faker->randomElement($status),
        'file_laporan' =>$faker->randomElement($file),
        'nilai' =>$faker->numberBetween(10,100),
        'mahasiswa_id' => $faker->unique()->numberBetween(1,10),
        
       ]);
    }
  

       User::create([
        'name' => 'Anandito',
        'nip' => '1921281813',
        'email' => 'laravelll2022@gmail.com',
        'jeniskelamin' => 'Pria',
        'nohp' => '123123213',
        'password' => bcrypt('12345678'),
    ]);

    for ($i=0; $i < 10; $i++) { 
        Bimbingan::create([
            'mitra' =>$faker->randomElement($mitra),
            'posisi' =>$faker->randomElement($posisi),
            'mahasiswa_id' => $faker->numberBetween(1,10),
           ]);
        }
    }
}
