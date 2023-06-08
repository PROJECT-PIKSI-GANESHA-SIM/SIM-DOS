<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_studis')->insert(['name' => 'Administrasi Kantor dan Keuangan (AKE)']);
        DB::table('program_studis')->insert(['name' => 'Komputerisasi Akuntansi (KAT)']);
        DB::table('program_studis')->insert(['name' => 'Bisnis Digital (BDI)']);
        DB::table('program_studis')->insert(['name' => 'Manajemen Informatika  (MIF)']);
        DB::table('program_studis')->insert(['name' => 'Teknik Informatika (TIK)']);
        DB::table('program_studis')->insert(['name' => 'Manajemen Sistem Informasi (MSI)']);
        DB::table('program_studis')->insert(['name' => 'Produksi Media (PME)']);
        DB::table('program_studis')->insert(['name' => 'Manajemen Rumah Sakit (MRS)']);
        DB::table('program_studis')->insert(['name' => 'Rekam Medis & Informasi Kesehatan (RMIK)']);
        DB::table('program_studis')->insert(['name' => 'Fisioterapi (FIS)']);
        DB::table('program_studis')->insert(['name' => 'Analis Kesehatan (AKS)']);
        DB::table('program_studis')->insert(['name' => 'Manajemen Informasi Kesehatan (MIK)']);
    }
}
