<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/login';

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
            'nim' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'program_studi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
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
        session()->flash('message', 'Registrasi berhasil! Silahkan Login menggunakan nim dan password anda');

        $mappingFakultas = [
            'ftib' => 'Fakultas Teknologi Informasi dan Bisnis',
            'fteic' => 'Fakultas Teknologi Elektro dan Industri Cerdas',
            // Tambahkan pemetaan fakultas lainnya di sini
        ];

        $mappingProgramStudi = [
            'ti' => 'Teknik Informatika',
            'si' => 'Sistem Informasi',
            'it' => 'Teknologi Informasi',
            'sd' => 'Sains Data',
            'rpl' => 'Rekayasa Perangkat Lunak',
            'tt' => 'Teknik Telekomunikasi',
            'te' => 'Teknik Elektro',
            'tit' => 'Teknik Industri',
            'tl' => 'Teknik Logistik',
            // Tambahkan pemetaan program studi lainnya di sini
        ];

        $fakultasValue = $data['fakultas'];
        $programStudiValue = $data['program_studi'];

        $fakultasLabel = $mappingFakultas[$fakultasValue];
        $programStudiLabel = $mappingProgramStudi[$programStudiValue];

        return Peminjam::create([
            'nim' => $data['nim'],
            'name' => $data['name'],
            'program_studi' => $programStudiLabel,
            'fakultas' => $fakultasLabel,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
