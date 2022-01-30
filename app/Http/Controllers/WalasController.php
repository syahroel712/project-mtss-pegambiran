<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalasModel;
use App\Models\TahunAjarModel;
use App\Models\SemesterModel;
use App\Models\KelasModel;
use App\Models\GuruModel;
use DB;

class WalasController extends Controller
{
    public function index()
    {
        $walas = DB::table('tb_walas')
                ->join('tb_guru','tb_guru.guru_id', 'tb_walas.guru_id')
                ->join('tb_kelas','tb_kelas.kelas_id', 'tb_walas.kelas_id')
                ->join('tb_tahun_ajar','tb_tahun_ajar.tahun_ajar_id', 'tb_walas.tahun_ajar_id')
                ->select('tb_walas.*','tb_guru.guru_nama', 'tb_kelas.kelas_nama', 'tb_tahun_ajar.tahun_ajar_nama')
                ->orderBy('tb_kelas.kelas_nama', 'ASC')
                ->orderBy('tb_tahun_ajar.tahun_ajar_nama', 'DESC')
                ->get();

        $siswa = DB::table('tb_siswa')
                ->get();
                
        return view('pages/walas/index',[
            'active' => 'walas',
            'walas' => $walas,
            'siswa' => $siswa,
        ]);
    }

    public function create()
    {
        $tahunAjar = TahunAjarModel::all();
        $kelas = KelasModel::all();
        $guru = DB::table('tb_guru')
                ->where('guru_jabatan', 'guru')
                ->get();

        return view('pages/walas/form',[
            'active' => 'walas',
            'url' => 'walas',
            'tahunAjar' => $tahunAjar,
            'kelas' => $kelas,
            'guru' => $guru,
        ]);
    }

    public function store(Request $request, WalasModel $walas)
    {
        $request->validate([
            'guru_id' => ['required'], 
            'kelas_id' => ['required'], 
            'tahun_ajar_id' => ['required'],
        ]);

        // cek apakah data sudah ada
        $cek_walas1 = DB::table('tb_walas')
                            ->where('guru_id', '=', $request->guru_id)
                            ->where('kelas_id', '=', $request->kelas_id)
                            ->where('tahun_ajar_id', '=', $request->tahun_ajar_id)
                            ->first();

        $cek_walas2 = DB::table('tb_walas')
                            ->where('kelas_id', '=', $request->kelas_id)
                            ->where('tahun_ajar_id', '=', $request->tahun_ajar_id)
                            ->first();

        if($cek_walas1){
            return redirect()
                ->route('walas.create')
                ->with('message', 'Data sudah terdaftar. Silahkan Perbaiki Data Terlebih Dahulu.')
                ->withInput();
        }elseif ($cek_walas2) {
            return redirect()
                ->route('walas.create')
                ->with('message', 'Data sudah terdaftar. Silahkan Perbaiki Data Terlebih Dahulu.')
                ->withInput();
        }

        $walas->guru_id = $request->input('guru_id');
        $walas->kelas_id = $request->input('kelas_id');
        $walas->tahun_ajar_id = $request->input('tahun_ajar_id');
        $walas->save();

        return redirect()
            ->route('walas')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(WalasModel $walas)
    {
        $tahunAjar = TahunAjarModel::all();
        $kelas = kelasModel::all();
        $guru = DB::table('tb_guru')
                ->where('guru_jabatan', 'guru')
                ->get();
                
        return view(
            'pages/walas/form',
            [
                'active' => 'walas',
                'url' => 'walas.update',
                'walas' => $walas,
                'tahunAjar' => $tahunAjar,
                'kelas' => $kelas,
                'guru' => $guru,
            ]
        );
    }

    public function update(Request $request, WalasModel $walas)
    {
        // dd($request->all());
        $request->validate([
            'guru_id' => ['required'], 
            'kelas_id' => ['required'], 
            'tahun_ajar_id' => ['required'],
        ]);


        // cek apakah data sudah ada
        $cek_walas1 = DB::table('tb_walas')
                            ->where('guru_id', '=', $request->guru_id)
                            ->where('kelas_id', '=', $request->kelas_id)
                            ->where('tahun_ajar_id', '=', $request->tahun_ajar_id)
                            ->first();

        if($cek_walas1){
            return redirect()
                ->route('walas.update', $walas->walas_id)
                ->with('message', 'Data sudah terdaftar. Silahkan Perbaiki Data Terlebih Dahulu.')
                ->withInput();
        }

        $walas->guru_id = $request->input('guru_id');
        $walas->kelas_id = $request->input('kelas_id');
        $walas->tahun_ajar_id = $request->input('tahun_ajar_id');
        $walas->save();

        return redirect()
            ->route('walas')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(WalasModel $walas)
    {

        $walas->forceDelete();

        return redirect()
            ->route('walas')
            ->with('message', 'Data berhasil dihapus');
    }
}
