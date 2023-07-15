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
        $user = User::create([
            'nidn' => '111111111',
            'name' => 'dosen',
            'email' => 'dosen@gmail.test',
            'no_telpn' => '0853595',
            'password' => Hash::make('dosen123')
        ]);

        $dosenRole = Role::findOrFail(1); 
        $user->assignRole($dosenRole);
    }
}
