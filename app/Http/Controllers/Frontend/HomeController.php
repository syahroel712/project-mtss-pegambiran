<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;
class HomeController extends Controller
{

    public function __construct() {
        $menu_profile = DB::table('tb_profile')
                        ->select('profile_nama', 'profile_slug')
                        ->get();

        $menu_info = DB::table('tb_info')
                    ->select('info_tipe', 'info_tipe_slug')
                    ->groupBy('info_tipe')
                    ->get();


        View::share([
            'menu_profile' => $menu_profile,
            'menu_info' => $menu_info,
        ]);
    }

    public function index()
    {
        $slider = DB::table('tb_slider')->get();
        $pengumuman = DB::table('tb_info')
                        ->where('info_tipe', 'Pengumuman')
                        ->orderBy('info_tgl', 'DESC')
                        ->limit(3)
                        ->get();

        $berita_utama = DB::table('tb_info')
                        ->where('info_tipe', 'Berita')
                        ->orderBy('info_tgl', 'DESC')
                        ->limit(1)
                        ->first();
        
        $berita = DB::table('tb_info')
                        ->where('info_tipe', 'Berita')
                        ->orderBy('info_tgl', 'DESC')
                        ->skip(1)
                        ->take(4)
                        ->get();

        $galeri = DB::table('tb_galeri')
                    ->orderBy('galeri_id', 'DESC')
                    ->limit(6)
                    ->get();

        return view('frontend/pages/home',[
            'active' => 'home',
            'slider' => $slider,
            'pengumuman' => $pengumuman,
            'berita_utama' => $berita_utama,
            'berita' => $berita,
            'galeri' => $galeri,
        ]);
    }

    public function profile($slug)
    {
        $profile = DB::table('tb_profile')
                        ->where('profile_slug', $slug)
                        ->first();

        return view('frontend/pages/profile',[
            'active' => 'profile',
            'profile' => $profile,
        ]);
    }
    
    public function info($slug)
    {
        $info = DB::table('tb_info')
                        ->where('info_tipe_slug', $slug)
                        ->orderBy('info_tgl', 'DESC')
                        ->paginate(8);

        return view('frontend/pages/info',[
            'active' => 'info',
            'info' => $info,
        ]);
    }

    public function infoDetail($slug)
    {
        $info_detail = DB::table('tb_info')
                        ->where('info_slug', $slug)
                        ->first();

        return view('frontend/pages/info_detail',[
            'active' => 'info',
            'info_detail' => $info_detail,
        ]);
    }

    public function galeri()
    {
        $galeri = DB::table('tb_galeri')
                    ->orderBy('galeri_id', 'DESC')
                    ->paginate(6);

        return view('frontend/pages/galeri',[
            'active' => 'galeri',
            'galeri' => $galeri,
        ]);
    }

    public function kontak()
    {
        return view('frontend/pages/kontak',[
            'active' => 'kontak',
        ]);
    }
    
    public function guru()
    {
        $guru = DB::table('tb_guru')    
                    ->where('guru_status', 'Aktif')
                    ->orderBy(DB::raw('FIELD(guru_jabatan, "Kepala Sekolah", "Guru", "Karyawan")'))
                    ->get();
        
        return view('frontend/pages/guru',[
            'active' => 'guru',
            'guru' => $guru,
        ]);
    }
}
