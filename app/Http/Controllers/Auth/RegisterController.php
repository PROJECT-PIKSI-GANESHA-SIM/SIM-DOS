<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AlamatKontak;
use App\Models\IdentitasDiri;
use App\Models\Kepegawaian;
use App\Models\LainLain;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nidn' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);

        $user = User::create([
            'name' => $data['name'],
            'nidn' => $data['nidn'],
            'email' => $data['email'],
            'no_telpn' => '-',
            'password' => Hash::make($data['password']),
        ]);

        $dosenRole = Role::findOrFail(1); 
        $user->assignRole($dosenRole);

        IdentitasDiri::create([
            'nidn' => $user->nidn,
            'nip' => '-',
            'nik' => '-',
            'foto' => '-',
            'nama' => '-',
            'jenis_kelamin' => '-',
            'golongan_darah' => '-',
            'kewarganegaraan' => 'Indonesia',
            'agama' => '-',
            'tempat_lahir' => '-',
            'tanggal_lahir' => now(),
            'status_perkawinan' => 'Belum Kawin',
            'user_id' => $user->id
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
            'user_id' => $user->id
        ]);

        LainLain::create([
            'npwp' => '-',
            'nama_wajib_pajak' => '-',
            'sinta_id' => '-',
            'user_id' => $user->id
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
            'user_id' => $user->id

        ]);

        return $user;

    }
}
