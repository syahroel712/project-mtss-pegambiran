<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\WalasController;
use App\Http\Controllers\WalasSiswaController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GaleriController;


use App\Http\Controllers\Frontend\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// halaman admin
Route::prefix('administrator')->group(function () {
    Route::middleware(['belum_login'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('/');
        Route::post('/aksilogin', [DashboardController::class, 'login'])->name('aksilogin');
        Route::get('/register', [DashboardController::class, 'register'])->name('register');
        Route::post('/aksiregister', [DashboardController::class, 'registerAdmin'])->name('aksiregister');
    });
    Route::middleware(['sudah_login'])->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
        
        // kelas
        Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
        Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');
        
        // mapel
        Route::get('/mata-pelajaran', [MapelController::class, 'index'])->name('mapel');
        Route::get('/mata-pelajaran/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/mata-pelajaran', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mata-pelajaran/{mapel}', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/mata-pelajaran/{mapel}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/mata-pelajaran/{mapel}', [MapelController::class, 'destroy'])->name('mapel.delete');

        // semester
        Route::get('semester', [SemesterController::class, 'index'])->name('semester');
        Route::get('/semester/create', [SemesterController::class, 'create'])->name('semester.create');
        Route::post('/semester', [SemesterController::class, 'store'])->name('semester.store');
        Route::get('/semester/{semester}', [SemesterController::class, 'edit'])->name('semester.edit');
        Route::put('/semester/{semester}', [SemesterController::class, 'update'])->name('semester.update');
        Route::delete('/semester/{semester}', [SemesterController::class, 'destroy'])->name('semester.delete');
        
        // tahun ajar
        Route::get('/tahun-ajar', [TahunAjarController::class, 'index'])->name('tahunAjar');
        Route::get('/tahun-ajar/create', [TahunAjarController::class, 'create'])->name('tahunAjar.create');
        Route::post('/tahun-ajar', [TahunAjarController::class, 'store'])->name('tahunAjar.store');
        Route::get('/tahun-ajar/{tahunAjar}', [TahunAjarController::class, 'edit'])->name('tahunAjar.edit');
        Route::put('/tahun-ajar/{tahunAjar}', [TahunAjarController::class, 'update'])->name('tahunAjar.update');
        Route::delete('/tahun-ajar/{tahunAjar}', [TahunAjarController::class, 'destroy'])->name('tahunAjar.delete');

        // siswa
        Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/{siswa}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.delete');
        
        // guru
        Route::get('guru', [GuruController::class, 'index'])->name('guru');
        Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
        Route::get('/guru/{guru}', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.delete');
        
        // admin
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.delete');

        // kepsek
        Route::get('kepsek', [KepsekController::class, 'index'])->name('kepsek');
        Route::get('/kepsek/create', [KepsekController::class, 'create'])->name('kepsek.create');
        Route::post('/kepsek', [KepsekController::class, 'store'])->name('kepsek.store');
        Route::get('/kepsek/{kepsek}', [KepsekController::class, 'edit'])->name('kepsek.edit');
        Route::put('/kepsek/{kepsek}', [KepsekController::class, 'update'])->name('kepsek.update');
        Route::delete('/kepsek/{kepsek}', [KepsekController::class, 'destroy'])->name('kepsek.delete');

        // wali kelas
        Route::get('/wali-kelas', [WalasController::class, 'index'])->name('walas');
        Route::get('/wali-kelas/create', [WalasController::class, 'create'])->name('walas.create');
        Route::post('/wali-kelas', [WalasController::class, 'store'])->name('walas.store');
        Route::get('/wali-kelas/{walas}', [WalasController::class, 'edit'])->name('walas.edit');
        Route::put('/wali-kelas/{walas}', [WalasController::class, 'update'])->name('walas.update');
        Route::delete('/wali-kelas/{walas}', [WalasController::class, 'destroy'])->name('walas.delete');
        // data siswa
        Route::get('/wali-kelas-siswa/{walas}', [WalasSiswaController::class, 'index'])->name('walasSiswa');
        Route::post('/wali-kelas-siswa', [WalasSiswaController::class, 'store'])->name('walasSiswa.store');
        Route::post('/wali-kelas-siswa-delete', [WalasSiswaController::class, 'destroy'])->name('walasSiswa.delete');
        

        // Rapor
        Route::get('/rapor', [RaporController::class, 'index'])->name('rapor');
        Route::get('/rapor/create', [RaporController::class, 'create'])->name('rapor.create');
        Route::post('/rapor', [RaporController::class, 'store'])->name('rapor.store');
        Route::get('/rapor/{rapor}', [RaporController::class, 'edit'])->name('rapor.edit');
        Route::post('/rapor/update', [RaporController::class, 'update'])->name('rapor.update');
        Route::post('/rapor/delete', [RaporController::class, 'destroy'])->name('rapor.delete');
        // cari siswa
        Route::post('/rapor/cari-siswa', [RaporController::class, 'cariSiswa'])->name('rapor.cariSiswa');
        Route::get('/rapor/cari-nilai-siswa/{siswa}/{kelas}/{semester}/{tahun_ajar}', [RaporController::class, 'cariNilaiSiswa'])->name('rapor.cariNilaiSiswa');
        // cara data siswa
        Route::get('/rapor/cari-data-siswa/{kelas}/{semester}/{tahun_ajar}', [RaporController::class, 'cariDataSiswa'])->name('rapor.cariDataSiswa');
        Route::get('/rapor/cari-data-nilai-siswa/{siswa}/{kelas}/{semester}/{tahun_ajar}', [RaporController::class, 'cariDataNilaiSiswa'])->name('rapor.cariDataNilaiSiswa');
        Route::get('/rapor/cetak-nilai-siswa/{siswa}/{kelas}/{semester}/{tahun_ajar}', [RaporController::class, 'cetakDataNilaiSiswa'])->name('rapor.cetakDataNilaiSiswa');

        // spp
        Route::get('spp', [SppController::class, 'index'])->name('spp');
        Route::get('/spp/create', [SppController::class, 'create'])->name('spp.create');
        Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
        Route::get('/spp/{spp}', [SppController::class, 'edit'])->name('spp.edit');
        Route::put('/spp/{spp}', [SppController::class, 'update'])->name('spp.update');
        Route::delete('/spp/{spp}', [SppController::class, 'destroy'])->name('spp.delete');
        Route::get('/spp/cetak/{spp}', [SppController::class, 'cetak'])->name('spp.cetak');

        // profile
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
        Route::get('/profile/{profile}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.delete');

        // info
        Route::get('info', [InfoController::class, 'index'])->name('info');
        Route::get('/info/create', [InfoController::class, 'create'])->name('info.create');
        Route::post('/info', [InfoController::class, 'store'])->name('info.store');
        Route::get('/info/{info}', [InfoController::class, 'edit'])->name('info.edit');
        Route::put('/info/{info}', [InfoController::class, 'update'])->name('info.update');
        Route::delete('/info/{info}', [InfoController::class, 'destroy'])->name('info.delete');

        // slider
        Route::get('slider', [SliderController::class, 'index'])->name('slider');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/{slider}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/slider/{slider}', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/slider/{slider}', [SliderController::class, 'destroy'])->name('slider.delete');

        // galeri
        Route::get('galeri', [GaleriController::class, 'index'])->name('galeri');
        Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
        Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
        Route::get('/galeri/{galeri}', [GaleriController::class, 'edit'])->name('galeri.edit');
        Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update');
        Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.delete');



    });
});
    


// halaman frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{slug}', [HomeController::class, 'profile'])->name('frontend.profile');
Route::get('/info/{slug}', [HomeController::class, 'info'])->name('frontend.info');
Route::get('/info/detail/{slug}', [HomeController::class, 'infoDetail'])->name('frontend.info.detail');
Route::get('/galeries', [HomeController::class, 'galeri'])->name('frontend.galeri');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('frontend.kontak');
Route::get('/data-guru', [HomeController::class, 'guru'])->name('frontend.guru');
