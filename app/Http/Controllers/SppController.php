<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SppModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\TahunAjarModel;
use DB;

class SppController extends Controller
{
    public function index()
    {
        $spp = DB::table('tb_spp')
                ->join('tb_siswa','tb_siswa.siswa_id', 'tb_spp.siswa_id')
                ->join('tb_kelas','tb_kelas.kelas_id', 'tb_spp.kelas_id')
                ->join('tb_tahun_ajar','tb_tahun_ajar.tahun_ajar_id', 'tb_spp.tahun_ajar_id')
                ->select('tb_spp.*','tb_siswa.siswa_nama','tb_siswa.siswa_nis', 'tb_kelas.kelas_nama', 'tb_tahun_ajar.tahun_ajar_nama')
                ->orderBy('tb_kelas.kelas_nama', 'ASC')
                ->orderBy('tb_tahun_ajar.tahun_ajar_nama', 'DESC')
                ->get();

        return view('pages/spp/index',[
            'active' => 'spp',
            'spp' => $spp,
        ]);
    }

    public function create()
    {
        $tahunAjar = TahunAjarModel::all();
        $kelas = KelasModel::all();
        $siswa = SiswaModel::all();

        return view('pages/spp/form',[
            'active' => 'spp',
            'url' => 'spp',
            'tahunAjar' => $tahunAjar,
            'kelas' => $kelas,
            'siswa' => $siswa,
        ]);
    }

    public function store(Request $request, SppModel $spp)
    {
        $request->validate([
            'siswa_id' => ['required'], 
            'kelas_id' => ['required'], 
            'tahun_ajar_id' => ['required'],
            'spp_tgl_bayar' => ['required','date'],
            'spp_bayar' => ['required','numeric'],
        ]);

        $spp->siswa_id = $request->input('siswa_id');
        $spp->kelas_id = $request->input('kelas_id');
        $spp->tahun_ajar_id = $request->input('tahun_ajar_id');
        $spp->spp_tgl_bayar = $request->input('spp_tgl_bayar');
        $spp->spp_bayar = $request->input('spp_bayar');
        $spp->save();

        return redirect()
            ->route('spp')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(SppModel $spp)
    {
        $tahunAjar = TahunAjarModel::all();
        $kelas = kelasModel::all();
        $siswa = SiswaModel::all();
                
        return view(
            'pages/spp/form',
            [
                'active' => 'spp',
                'url' => 'spp.update',
                'spp' => $spp,
                'tahunAjar' => $tahunAjar,
                'kelas' => $kelas,
                'siswa' => $siswa,
            ]
        );
    }

    public function update(Request $request, SppModel $spp)
    {
        $request->validate([
            'siswa_id' => ['required'], 
            'kelas_id' => ['required'], 
            'tahun_ajar_id' => ['required'],
            'spp_tgl_bayar' => ['required','date'],
            'spp_bayar' => ['required','numeric'],
        ]);

        $spp->siswa_id = $request->input('siswa_id');
        $spp->kelas_id = $request->input('kelas_id');
        $spp->tahun_ajar_id = $request->input('tahun_ajar_id');
        $spp->spp_tgl_bayar = $request->input('spp_tgl_bayar');
        $spp->spp_bayar = $request->input('spp_bayar');
        $spp->save();

        return redirect()
            ->route('spp')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(SppModel $spp)
    {

        $spp->forceDelete();

        return redirect()
            ->route('spp')
            ->with('message', 'Data berhasil dihapus');
    }

    public function cetak($id)
    {
        $spp = DB::table('tb_spp')
                ->join('tb_siswa','tb_siswa.siswa_id', 'tb_spp.siswa_id')
                ->join('tb_kelas','tb_kelas.kelas_id', 'tb_spp.kelas_id')
                ->join('tb_tahun_ajar','tb_tahun_ajar.tahun_ajar_id', 'tb_spp.tahun_ajar_id')
                ->select('tb_spp.*','tb_siswa.siswa_nama','tb_siswa.siswa_nis', 'tb_kelas.kelas_nama', 'tb_tahun_ajar.tahun_ajar_nama')
                ->where('tb_spp.spp_id', $id)
                ->first();
                

        return view('pages/spp/cetak',[
            'spp' => $spp,
        ]);
    }

}
