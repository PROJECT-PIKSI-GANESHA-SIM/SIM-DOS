<?php

namespace Database\Seeders;

use App\Models\JenjangPendidikan;
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
        DB::table('users')->insert([
            'nidn' => '111111111',
            'name' => 'admin',
            'email' => 'admin@gmail.test',
            'no_telpn' => '0853595',
            'password' => Hash::make('admin123')
        ]);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(ProgramStudiTableSeeder::class);
        $this->call(JenjangPendidikanTableSeeder::class);
        $this->call(PredikatKelulusanTableSeeder::class);
    }
}
