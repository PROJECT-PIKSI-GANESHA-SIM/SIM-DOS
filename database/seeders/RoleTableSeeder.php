<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'dosen',
            'guard_name' => 'web'
        ]);

        DB::table('roles')->insert([
            'name' => 'akademik',
            'guard_name' => 'web'
        ]);
    }
}
