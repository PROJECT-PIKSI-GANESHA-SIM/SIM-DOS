<?php

namespace Database\Seeders;

use App\Models\AlamatKontak;
use App\Models\IdentitasDiri;
use App\Models\JenjangPendidikan;
use App\Models\Kepegawaian;
use App\Models\LainLain;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProgramStudiTableSeeder::class);
        $this->call(JenjangPendidikanTableSeeder::class);
        $this->call(PredikatKelulusanTableSeeder::class);
        $this->call(PesanTableSeeder::class);

        IdentitasDiri::create([
            'nip' => '-',
            'nik' => '-',
            'nama' => '-',
            'jenis_kelamin' => '-',
            'golongan_darah' => '-',
            'kewarganegaraan' => 'Indonesia',
            'agama' => '-',
            'tempat_lahir' => '-',
            'tanggal_lahir' => now(),
            'status_perkawinan' => 'Belum Kawin',
            'user_id' => 1
        ]);

        AlamatKontak::create([
            'alamat' => '-',
            'rt' => '-',
            'rw' => '-',
            'no' => '-',
            'desa_kelurahan' => '-',
            'kecamatan' => '-',
            'kota_kabupaten' => '-',
            'provinsi' => '-',
            'tempat_lahir' => '-',
            'kode_pos' => '-',
            'no_telepon_rumah' => '-',
            'user_id' => 1
        ]);

        LainLain::create([
            'npwp' => '-',
            'nama_wajib_pajak' => '-',
            'sinta_id' => '-',
            'user_id' => 1
        ]);

        Kepegawaian::create([
            'program_studi' => '-',
            'status_kepegawaian' => '-',
            'status_keaktifan' => 'Aktif',
            'jabatan_fungsional' => '-',
            'no_sk_sertifikasi_dosen' => '-',
            'no_sk_tmmd' => '-',
            'tanggal_menjadi_dosen' => now(),
            'pangkat_golongan' => '-',
            'user_id' => 1

        ]);

    }
}
