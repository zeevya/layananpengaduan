<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        DB::table('divisi')->insert([
            ['nama_divisi' => 'Keimigrasian'],
            ['nama_divisi' => 'Administrasi'],
            ['nama_divisi' => 'Pelayanan Publik'],
        ]);
    }
}