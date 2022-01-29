<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalasModel;
use App\Models\WalasSiswaModel;
use DB;

class WalasSiswaController extends Controller
{
    public function index($id)
    {
        $walasSiswa = DB::table('tb_walas_siswa')
                    ->join('tb_siswa', 'tb_siswa.siswa_id','tb_walas_siswa.siswa_id')
                    ->select('tb_siswa.siswa_nis','tb_siswa.siswa_nama', 'tb_walas_siswa.*')
                    ->where('tb_walas_siswa.walas_id', $id)
                    ->get();

        return view('pages/walas/data-siswa',[
            'walasSiswa' => $walasSiswa,
        ]);
    }

    public function store(Request $request, WalasSiswaModel $walasSiswa)
    {
        $request->validate([
            'siswa_id' => ['required'], 
            'walas_id' => ['required'], 
        ]);

        // cek data apakah sudah ada
        $cek = DB::table('tb_walas_siswa')
                ->where('walas_id', $request->walas_id)
                ->where('siswa_id', $request->siswa_id)
                ->first();
        if($cek){
            return json_encode([
                'message' => 'Siswa sudah terdaftar di kelas lain, silahkan perbaiki terlebih dahulu..',
            ]); 
        }
                
        $walasSiswa->walas_id = $request->input('walas_id');
        $walasSiswa->siswa_id = $request->input('siswa_id');
        $walasSiswa->save();

        return json_encode([
            'message' => 'Pendaftaraan siswa berhasil..',
        ]); 
    }

    public function destroy(Request $request)
    {

        DB::table('tb_walas_siswa')
            ->where('walas_siswa_id', $request->walas_siswa_id)
            ->delete();

        return json_encode([
            'message' => 'Siswa berhasil dihapus..',
        ]); 
    }
}
