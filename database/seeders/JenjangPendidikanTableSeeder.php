<?php

namespace Database\Seeders;

use App\Models\JenjangPendidikan;
use Illuminate\Database\Seeder;

class JenjangPendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
    *
     * @return void
     */
    public function run()
    {
        JenjangPendidikan::create(["name" => 'SD']);
        JenjangPendidikan::create(["name" => 'SMP/MTs']);
        JenjangPendidikan::create(["name" => 'SMA/SMK/MAN']);
        JenjangPendidikan::create(["name" => 'D3']);
        JenjangPendidikan::create(["name" => 'D4/S1']);
        JenjangPendidikan::create(["name" => 'S2']);
        JenjangPendidikan::create(["name" => 'S3']);
    }
}
