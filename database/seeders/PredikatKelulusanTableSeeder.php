<?php

namespace Database\Seeders;

use App\Models\PredikatKelulusan;
use Illuminate\Database\Seeder;

class PredikatKelulusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PredikatKelulusan::create(["name" => "Cukup (IPK 2.00 - 2.75)", "value" => "Cukup"]);
        PredikatKelulusan::create(["name" => "Memuaskan (IPK 2.76 - 3.00)", "value" => "Memuaskan"]);
        PredikatKelulusan::create(["name" => "Sangat Memuaskan (IPK 3.01 - 3.50)", "value" => "Sangat Memuaskan"]);
        PredikatKelulusan::create(["name" => "Dengan Pujian/Cumlaude (IPK 3.51 - 3.75)", "value" => "Dengan Pujian/Cumlaude"]);
        PredikatKelulusan::create(["name" => "Dengan Pujian Tertinggi/Summa Cumlaude (IPK 3.76 - 4.00)", "value" => "Dengan Pujian Tertinggi/Summa Cumlaude"]);
    }
}
