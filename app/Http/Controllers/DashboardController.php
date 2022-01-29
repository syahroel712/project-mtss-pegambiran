<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages/auth/login');
    }

    public function dashboard()
    {
        $active = 'home';
        return view('pages/home',[
            'active' => $active
        ]);
    }

    public function login(Request $request)
    {
        if($request->level == "Admin"){
            $user = DB::table('tb_admin')
                    ->where('admin_username', '=', $request->username)
                    ->first();

            if (!$user) {
                return back()->with("message", "Username Salah");
            }
            if (!Hash::check($request->password, $user->admin_password)) {
                return back()->with("message", "Password Salah");
            }

            // masukan data login ke session
            $request->session()->put('user_id', $user->admin_id);
            $request->session()->put('user_nama', $user->admin_nama);
            $request->session()->put('user_username', $user->admin_username);
            $request->session()->put('user_jabatan', "Admin");
                    
        }elseif ($request->level == "Guru") {
            $user = DB::table('tb_admin')
                    ->where('admin_username', '=', $request->username)
                    ->first();
        }elseif ($request->level == "Karyawan") {
            $user = DB::table('tb_admin')
                    ->where('admin_username', '=', $request->username)
                    ->first();
        }elseif ($request->level == "Siswa") {
            $user = DB::table('tb_admin')
                    ->where('admin_username', '=', $request->username)
                    ->first();
        
        }else{
                return back()->with("message", "Silahkan pilih level");
        }

        if(session()->get('user_jabatan') == 'Kepala Sekolah'){
            // cari data kepsek
            $kepsek = DB::table('tb_kepsek')
                        ->where('guru_id', $user->guru_id)
                        ->first();
            $request->session()->put('kepsek_id', $kepsek->kepsek_id);
        }

        // redirect ke halaman home
        return redirect('administrator/dashboard')->with("pesan", "Selamat Datang " . session('user_nama'));        
    }

    public function register()
    {
        return view('pages/auth/register');
    }

    public function registerAdmin(Request $request)
    {
        $nama = $request->name;
        $username = $request->username;
        $password = $request->password;
        $pwd = Hash::make($password);

        $cek = DB::table('tb_admin')->where('admin_username', '=', $username)->first();
        if ($cek != NULL) {
            return back()->with('message', 'Username Sudah Terdaftar');
        } else {
            $data = array(
                'admin_nama' => $nama,
                'admin_username' => $username,
                'admin_password' => $pwd,
            );
            DB::table('tb_admin')->insert($data);
            return redirect()
                ->route('/')
                ->with('pesan', 'Register Sukses');
        }
    }

    function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('user_nama');
        $request->session()->forget('user_username');
        $request->session()->forget('user_level');
        $request->session()->forget('guru_id');
        $request->session()->forget('token');
        // redirect ke halaman home
        return redirect('/')->with("pesan", "Anda Sudah Logout");
    }
}
