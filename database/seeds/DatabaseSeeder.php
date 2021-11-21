<?php

use App\Buku;
use App\Galeri;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'level' => 'admin',
            'name' => "LANA SAIFUL AQIL",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'level' => 'user',
            'name' => "lana saiful aqil",
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        Buku::create([
            'judul' => 'Contoh Judul',
            'penulis' => 'Contoh Penulis',
            'harga' => '120000',
            'tgl_terbit' => '2002/04/11',
            'buku_seo' => 'contoh-judul',
            'foto' => null
        ]);

        Galeri::create([
            'nama_galeri' => 'Contoh Judul Galeri 1',
            'galeri_seo' => 'contoh-judul-galeri-1',
            'keterangan' => 'keterangan',
            'foto' => null,
            'id_buku' => '1'
        ]);
    }
}
