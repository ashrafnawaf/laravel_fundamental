<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed data pertama
        $user1 = User::create([
            'name' => 'taufiqy',
            'email' => 'taufiqy@gmail.com',
            'password' => bcrypt('taufiqy123'),
        ]);

        $profile1 = Profile::create([
            'nama' => 'Taufiqy Firdaus',
            'email' => 'taufiqy@gmail.com',
            'gender' => 'Male',
            'umur' => 20,
            'tgl_lahir' => '2004-01-31',
            'alamat' => 'Jalan Danau Toba, Sawojajar, Kota Malang',
            'user_id' => $user1->id,
        ]);

        $toko1 = Toko::create([
            'nama_toko' => 'Tau Store',
            'rate' => 4,
            'produk_terbaik' => 'Kucing oren',
            'deskripsi' => 'Toko kucing terbaik di kota',
            'profile_id' => $profile1->id,
        ]);

        // Seed data kedua
        $user2 = User::create([
            'name' => 'joko',
            'email' => 'joko@gmail.com',
            'password' => bcrypt('joko123'),
        ]);

        $profile2 = Profile::create([
            'nama' => 'Joko Tengger',
            'email' => 'joko@gmail.com',
            'gender' => 'Male',
            'umur' => 25,
            'tgl_lahir' => '1999-10-15',
            'alamat' => 'Jalan Platinum IV, Kota Surabaya',
            'user_id' => $user2->id,
        ]);

        $toko2 = Toko::create([
            'nama_toko' => "Joko's Store",
            'rate' => 3,
            'produk_terbaik' => 'Anjing lucu',
            'deskripsi' => 'Toko anjing terbaik yang ada di kota',
            'profile_id' => $profile2->id,
        ]);
    }
}