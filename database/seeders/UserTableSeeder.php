<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create user dosen

        $dosen = User::create([
            'nidn' => '111111111',
            'name' => 'dosen',
            'email' => 'dosen@gmail.test',
            'no_telpn' => '0853595',
            'password' => Hash::make('dosen123')
        ]);

        $dosenRole = Role::findOrFail(1); 
        $dosen->assignRole($dosenRole);

        // Create user akademik

        $akademik = User::create([
            'nidn' => '1234567',
            'name' => 'akademik',
            'email' => 'akademik@gmail.test',
            'no_telpn' => '08123456',
            'password' => Hash::make('akademik123')
        ]);

        $akademikRole = Role::findOrFail(2); 
        $akademik->assignRole($akademikRole);
    }
}
