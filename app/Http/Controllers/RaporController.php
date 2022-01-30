<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiModel;
use App\Models\KelasModel;
use App\Models\SemesterModel;
use App\Models\TahunAjarModel;
use App\Models\MapelModel;
use DB;

class RaporController extends Controller
{
    public function index()
    {
        if(session()->get('user_jabatan') == 'Guru'){
            $kelas = DB::table('tb_walas')
                    ->join('tb_kelas', 'tb_walas.kelas_id', 'tb_kelas.kelas_id')
                    ->select('tb_kelas.kelas_id', 'tb_kelas.kelas_nama')
                    ->where('tb_walas.guru_id', session()->get('user_id'))
                    ->groupBy('tb_kelas.kelas_nama')
                    ->get();
        }else{
            $kelas = KelasModel::all();
        }
        $semester = SemesterModel::all();
        $tahunAjar = TahunAjarModel::all();
        $mapel = MapelModel::all();

        return view('pages/rapor/index',[
            'active' => 'rapor',
            'url' => 'rapor',
            'kelas' => $kelas,
            'semester' => $semester,
            'tahunAjar' => $tahunAjar,
            'mapel' => $mapel,
        ]);

    }

    public function create()
    {
        if(session()->get('user_jabatan') == 'Guru'){
            $kelas = DB::table('tb_walas')
                    ->join('tb_kelas', 'tb_walas.kelas_id', 'tb_kelas.kelas_id')
                    ->select('tb_kelas.kelas_id', 'tb_kelas.kelas_nama')
                    ->where('tb_walas.guru_id', session()->get('user_id'))
                    ->groupBy('tb_kelas.kelas_nama')
                    ->get();
        }else{
            $kelas = KelasModel::all();
        }

        $semester = SemesterModel::all();
        $tahunAjar = TahunAjarModel::all();
        $mapel = MapelModel::all();

        return view('pages/rapor/form',[
            'active' => 'input-rapor',
            'url' => 'rapor',
            'kelas' => $kelas,
            'semester' => $semester,
            'tahunAjar' => $tahunAjar,
            'mapel' => $mapel,
        ]);
    }

    public function store(Request $request)
    {
        // cek apakah data sudah ada di tb_nilai
        $cek_nilai = DB::table('tb_nilai')
                    ->where('siswa_id', $request->siswa_id)
                    ->where('kelas_id', $request->kelas_id)
                    ->where('semester_id', $request->semester_id)
                    ->where('tahun_ajar_id', $request->tahun_ajar_id)
                    ->first();

        // cari data walas 
        $guru = DB::table('tb_walas')
                ->where('kelas_id', $request->kelas_id)
                ->where('tahun_ajar_id', $request->tahun_ajar_id)
                ->first();


        // jika ada, tinggal ambil nilai id
        if($cek_nilai){
            // cek apakah nilai mapel tersebut sudah ada, jika tidak ada insert
            $cek_nilai_detail = DB::table('tb_nilai_detail')
                                ->where('nilai_id', $cek_nilai->nilai_id)
                                ->where('mapel_id', $request->mapel_id)
                                ->first();
            
            if(empty($cek_nilai_detail)){
                DB::table('tb_nilai_detail')
                    ->insert([
                        'nilai_id' => $cek_nilai->nilai_id,
                        'mapel_id' => $request->mapel_id,
                        'nilai_detail_kognitif' => $request->nilai_detail_kognitif,
                        'nilai_detail_keterampilan' => $request->nilai_detail_keterampilan,
                    ]);
                return json_encode([
                    'message' => 'Nilai mata pelajaran berhasil di tambahkan..',
                ]);
            }else{
                return json_encode([
                    'message' => 'Nilai mata pelajaran sudah ada..',
                ]);
            }
                                
        } else {
            // cari data kepalas sekolah saat ini
            $kepsek = DB::table('tb_guru')
                        ->where('guru_jabatan', 'Kepala Sekolah')
                        ->first();

            // insert ke tb_nilai
            $nilai_id = DB::table('tb_nilai')
                    ->insertGetId([
                        'guru_id' => $guru->guru_id,
                        'kepsek_id' => $kepsek->guru_id,
                        'siswa_id' => $request->siswa_id,
                        'kelas_id' => $request->kelas_id,
                        'semester_id' => $request->semester_id,
                        'tahun_ajar_id' => $request->tahun_ajar_id,
                        'nilai_tahun' => date('Y'),
                    ]);
            
            // insert ke tb_nilai_detail
            DB::table('tb_nilai_detail')
                    ->insert([
                        'nilai_id' => $nilai_id,
                        'mapel_id' => $request->mapel_id,
                        'nilai_detail_kognitif' => $request->nilai_detail_kognitif,
                        'nilai_detail_keterampilan' => $request->nilai_detail_keterampilan,
                    ]);
            
            return json_encode([
                'message' => 'Nilai mata pelajaran berhasil di tambahkan..',
            ]);

        }


    }

    public function edit(NilaiModel $rapor)
    {
        return view(
            'pages/rapor/form',
            [
                'active' => 'rapor',
                'rapor' => $rapor,
                'url' => 'rapor.update',
            ]
        );
    }

    public function update(Request $request)
    {
        DB::table('tb_nilai_detail')
            ->where('nilai_detail_id', $request->nilai_detail_id)
            ->update([
                'nilai_detail_kognitif' => $request->nilai_detail_kognitif,
                'nilai_detail_keterampilan' => $request->nilai_detail_keterampilan,
            ]);

        return json_encode([
            'message' => 'Nilai mata pelajaran berhasil diedit..',
        ]); 

    }

    public function destroy(Request $request)
    {

        DB::table('tb_nilai_detail')
            ->where('nilai_detail_id', $request->nilai_detail_id)
            ->delete();

        return json_encode([
            'message' => 'Nilai mata pelajaran berhasil dihapus..',
        ]); 
    }


    // api cari siswa
    public function cariSiswa(Request $request)
    {
        // cari data walas
        $walas = DB::table('tb_walas')
                ->where('kelas_id', $request->kelas_id)
                ->where('tahun_ajar_id', $request->tahun_ajar_id)
                ->first();

        if(empty($walas)){
            return json_encode([
                'success' => false,
                'data' => ''
            ], 200);
        }

        // cari data siswa di kelas tersebut
        $walas_siswa = DB::table('tb_walas_siswa')
                        ->join('tb_siswa', 'tb_siswa.siswa_id', 'tb_walas_siswa.siswa_id')
                        ->select('tb_siswa.siswa_id','tb_siswa.siswa_nis', 'tb_siswa.siswa_nama')
                        ->where('tb_walas_siswa.walas_id', $walas->walas_id)
                        ->get();

        return json_encode([
            'success' => true,
            'data' => $walas_siswa
        ], 200);

    }

    public function cariNilaiSiswa($siswa_id, $kelas_id, $semester_id, $tahun_ajar_id)
    {
        $cek_nilai = DB::table('tb_nilai')
                    ->where('siswa_id', $siswa_id)
                    ->where('kelas_id', $kelas_id)
                    ->where('semester_id', $semester_id)
                    ->where('tahun_ajar_id', $tahun_ajar_id)
                    ->first();
        
        if($cek_nilai){
            $nilai_detail = DB::table('tb_nilai_detail')
                                ->join('tb_mapel', 'tb_nilai_detail.mapel_id', 'tb_mapel.mapel_id')
                                ->where('tb_nilai_detail.nilai_id', $cek_nilai->nilai_id)
                                ->orderBy('tb_mapel.mapel_nama')
                                ->get();
        }else{
            $nilai_detail = [];
        }

        return view('pages/rapor/data-nilai-siswa',[
            'nilai_detail' => $nilai_detail,
        ]);

    }

    // cari data siswa
    public function cariDataSiswa($kelas_id, $semester_id, $tahun_ajar_id)
    {
        // cari data walas
        $walas = DB::table('tb_walas')
                ->where('kelas_id', $kelas_id)
                ->where('tahun_ajar_id', $tahun_ajar_id)
                ->first();
        
        if(empty($walas)){
            $walas_siswa = [];
        }else{
            // cari data siswa di kelas tersebut
            // $walas_siswa = DB::table('tb_nilai')
            //                 ->leftJoin('tb_siswa', 'tb_siswa.siswa_id', 'tb_nilai.siswa_id')
            //                 ->select('tb_siswa.siswa_id','tb_siswa.siswa_nis', 'tb_siswa.siswa_nama','tb_nilai.kepsek_id')
            //                 ->where('tb_nilai.guru_id', $walas->guru_id)
            //                 ->where('tb_nilai.kelas_id', $kelas_id)
            //                 ->where('tb_nilai.semester_id', $semester_id)
            //                 ->where('tb_nilai.tahun_ajar_id', $tahun_ajar_id)
            //                 ->get();

            $walas_siswa = DB::table('tb_walas_siswa')
                            ->leftJoin('tb_walas', 'tb_walas_siswa.walas_id', 'tb_walas.walas_id')
                            ->leftJoin('tb_siswa', 'tb_walas_siswa.siswa_id', 'tb_siswa.siswa_id')
                            ->leftJoin('tb_nilai', function($join)
                                {
                                    $join->on('tb_walas_siswa.siswa_id', '=', 'tb_nilai.siswa_id');
                                    $join->on('tb_walas.guru_id', '=', 'tb_nilai.guru_id');
                                    $join->on('tb_walas.kelas_id', '=', 'tb_nilai.kelas_id');
                                    $join->on('tb_walas.tahun_ajar_id', '=', 'tb_nilai.tahun_ajar_id');
                                })
                            ->where('tb_walas.guru_id', $walas->guru_id)
                            ->where('tb_nilai.kelas_id', $kelas_id)
                            ->where('tb_nilai.semester_id', $semester_id)
                            ->where('tb_nilai.tahun_ajar_id', $tahun_ajar_id)
                            ->get();

        }

        return view('pages/rapor/data-siswa',[
            'walas_siswa' => $walas_siswa,
            'kelas_id' => $kelas_id,
            'semester_id' => $semester_id,
            'tahun_ajar_id' => $tahun_ajar_id,
        ]);
    }

    public function cariDataNilaiSiswa($siswa_id, $kelas_id, $semester_id, $tahun_ajar_id)
    {
        $cek_nilai = DB::table('tb_nilai')
                    ->where('siswa_id', $siswa_id)
                    ->where('kelas_id', $kelas_id)
                    ->where('semester_id', $semester_id)
                    ->where('tahun_ajar_id', $tahun_ajar_id)
                    ->first();

        if($cek_nilai){
            $nilai_detail = DB::table('tb_nilai_detail')
                                ->join('tb_mapel', 'tb_nilai_detail.mapel_id', 'tb_mapel.mapel_id')
                                ->where('tb_nilai_detail.nilai_id', $cek_nilai->nilai_id)
                                ->orderBy('tb_mapel.mapel_nama')
                                ->get();
        }else{
            $nilai_detail = [];
        }

        return view('pages/rapor/data-rapor-siswa',[
            'nilai_detail' => $nilai_detail,
        ]);
    }

    public function cetakDataNilaiSiswa($siswa_id, $kelas_id, $semester_id, $tahun_ajar_id)
    {
        $data_siswa = DB::table('tb_nilai')
                        ->join('tb_guru', 'tb_nilai.guru_id', 'tb_guru.guru_id')
                        ->join('tb_siswa', 'tb_nilai.siswa_id', 'tb_siswa.siswa_id')
                        ->join('tb_kelas', 'tb_nilai.kelas_id', 'tb_kelas.kelas_id')
                        ->join('tb_semester', 'tb_nilai.semester_id', 'tb_semester.semester_id')
                        ->join('tb_tahun_ajar', 'tb_nilai.tahun_ajar_id', 'tb_tahun_ajar.tahun_ajar_id')
                        ->leftJoin('tb_kepsek', 'tb_nilai.kepsek_id', 'tb_kepsek.kepsek_id')
                        ->select('tb_siswa.siswa_nis', 'tb_siswa.siswa_nama', 'tb_semester.semester_nama', 'tb_kelas.kelas_nama', 'tb_tahun_ajar.tahun_ajar_nama', 'tb_guru.guru_nama', 'tb_guru.guru_nip', 'tb_nilai.kepsek_id')
                        ->where('tb_nilai.siswa_id', $siswa_id)
                        ->where('tb_nilai.kelas_id', $kelas_id)
                        ->where('tb_nilai.semester_id', $semester_id)
                        ->where('tb_nilai.tahun_ajar_id', $tahun_ajar_id)
                        ->first();
                        
        $data_kepsek = DB::table('tb_kepsek')
                        ->join('tb_guru', 'tb_kepsek.guru_id', 'tb_guru.guru_id')
                        ->where('tb_guru.guru_id', $data_siswa->kepsek_id)
                        ->select('tb_guru.guru_nama', 'tb_guru.guru_nip')
                        ->first();

        $cek_nilai = DB::table('tb_nilai')
                    ->where('siswa_id', $siswa_id)
                    ->where('kelas_id', $kelas_id)
                    ->where('semester_id', $semester_id)
                    ->where('tahun_ajar_id', $tahun_ajar_id)
                    ->first();

        if($cek_nilai){
            $nilai_detail = DB::table('tb_nilai_detail')
                                ->join('tb_mapel', 'tb_nilai_detail.mapel_id', 'tb_mapel.mapel_id')
                                ->where('tb_nilai_detail.nilai_id', $cek_nilai->nilai_id)
                                ->orderBy('tb_mapel.mapel_nama')
                                ->get();
        }else{
            $nilai_detail = [];
        }

        return view('pages/rapor/cetak-rapor-siswa',[
            'data_siswa' => $data_siswa,
            'data_kepsek' => $data_kepsek,
            'nilai_detail' => $nilai_detail,
        ]);
    }

}
