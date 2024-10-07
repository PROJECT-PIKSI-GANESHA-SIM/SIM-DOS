<?php

namespace App\Http\Controllers;

use App\Models\AlamatKontak;
use App\Models\IdentitasDiri;
use App\Models\Kepegawaian;
use App\Models\LainLain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ConfigController extends Controller
{
    public function index() {

        $user = Auth::user();
        $all_user = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })->paginate(10);

        return view('akademik.config.index', [
            'user' => $user,
            'all_user' => $all_user
        ]);
    }

    public function create() {

        $user = Auth::user();

        return view('akademik.config.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request) {

        // validasi form
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nidn' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'no_telpn' => '-',
            'password' => Hash::make($request->password),
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

        return redirect()->route('config')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}
