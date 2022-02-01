<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GuruModel;
use App\Models\KepsekModel;
use App\Models\MapelModel;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    public function index()
    {
        $guru = GuruModel::all();
        return view('pages/guru/index',[
            'active' => 'guru',
            'guru' => $guru,
        ]);
    }

    public function create()
    {
        $mapel = MapelModel::all();
        return view('pages/guru/form',[
            'active' => 'guru',
            'url' => 'guru',
            'mapel' => $mapel,
        ]);
    }

    public function store(Request $request, GuruModel $guru, KepsekModel $kepsek)
    {
        $validator = Validator::make($request->all(), [
            'guru_nip'         => 'required|numeric|unique:tb_guru,guru_nip',  
            'guru_nama'     => 'required', 
            'guru_tgl_lahir'    => 'required', 
            'guru_jk'   => 'required', 
            'guru_notelp'   => 'required', 
            'guru_alamat'   => 'required', 
            'guru_username'     => 'required', 
            'guru_password'     => 'required', 
            'guru_jabatan'  => 'required', 
            'guru_status'   => 'required', 
            'guru_foto'   => 'required|mimes:jpg,jpeg,png', 
            'mapel_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('guru.create')
                ->withErrors($validator)
                ->withInput();
        }

        // cek apakah jabatan sebgai kepala sekolah
        if($request->input('guru_jabatan') == 'Kepala Sekolah'){
            $cek_kepsek = DB::table('tb_guru')->where('guru_jabatan', $request->input('guru_jabatan'))->first();
            if($cek_kepsek){
                return redirect()
                    ->route('guru.create')
                    ->with('message', 'Kepala Sekolah Sudah Terdaftar. Silahkan Perbaiki Data Terlebih Dahulu.')
                    ->withInput();
            }
        }

        $foto = $request->file('guru_foto');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('guru/', $filename);

        $guru->guru_nip = $request->input('guru_nip');
        $guru->guru_nama = $request->input('guru_nama');
        $guru->guru_tgl_lahir = $request->input('guru_tgl_lahir');
        $guru->guru_jk = $request->input('guru_jk');
        $guru->guru_notelp = $request->input('guru_notelp');
        $guru->guru_alamat = $request->input('guru_alamat');
        $guru->guru_username = $request->input('guru_username');
        $guru->guru_password = Hash::make($request->input('guru_password'));
        $guru->guru_jabatan = $request->input('guru_jabatan');
        $guru->guru_status = $request->input('guru_status');
        $guru->guru_foto = $filename;
        $guru->mapel_id = $request->input('mapel_id');
        $guru->save();
        
        $id = $guru->guru_id;

        // cek apakah jabatannya sebgai kepala sekolah
        if($request->input('guru_jabatan') == 'Kepala Sekolah'){
            $kepsek->guru_id = $id;
            $kepsek->kepsek_tahun =  $request->input('kepsek_tahun');
            $kepsek->save();   
        }   
        return redirect()
            ->route('guru')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(GuruModel $guru)
    {
        if($guru->guru_jabatan == 'Kepala Sekolah'){    
            $guru = DB::table('tb_guru')
                    ->join('tb_kepsek', 'tb_kepsek.guru_id', 'tb_guru.guru_id')
                    ->where('tb_guru.guru_id',$guru->guru_id)
                    ->first();
        }

        $mapel = MapelModel::all();

        return view(
            'pages/guru/form',
            [
                'active' => 'guru',
                'url' => 'guru.update',
                'guru' => $guru,
                'mapel' => $mapel,
            ]
        );
    }

    public function update(Request $request, GuruModel $guru)
    {
        $validator = Validator::make($request->all(), [
            'guru_nip'         => [
                                    'required', 
                                    Rule::unique('tb_guru')->ignore($guru->guru_id,'guru_id')
                                ],   
            'guru_nama'     => 'required', 
            'guru_tgl_lahir'    => 'required', 
            'guru_jk'   => 'required', 
            'guru_notelp'   => 'required', 
            'guru_alamat'   => 'required', 
            'guru_username'     => 'required', 
            'guru_jabatan'  => 'required', 
            'guru_status'   => 'required', 
            'guru_foto'   => 'mimes:jpg,jpeg,png', 
            'mapel_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('guru.update', $guru->guru_id)
                ->withErrors($validator)
                ->withInput();
        }

        // cek apakah jabatan sebgai kepala sekolah
        if($request->input('guru_jabatan') == 'Kepala Sekolah'){
            $cek_kepsek = DB::table('tb_guru')
                            ->where('guru_jabatan', $request->input('guru_jabatan'))
                            ->where('guru_id', '!=',$guru->guru_id)
                            ->first();
            if($cek_kepsek){
                return redirect()
                    ->route('guru.create')
                    ->with('message', 'Kepala Sekolah Sudah Terdaftar. Silahkan Perbaiki Data Terlebih Dahulu.')
                    ->withInput();
            }
        }

        if ($request->input('guru_password') != null) {
            $password = $request->input('guru_password');
            $pwd = Hash::make($password);
            $guru->guru_password = $pwd;
        }
        //cek tipe dari data lama dahulu
        if ($request->hasFile('guru_foto')) {
            
            unlink('guru/' . $guru->guru_foto);
            
            $foto = $request->file('guru_foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('guru/', $filename);
            $guru->guru_foto = $filename;
        }

        $guru->guru_nip = $request->input('guru_nip');
        $guru->guru_nama = $request->input('guru_nama');
        $guru->guru_tgl_lahir = $request->input('guru_tgl_lahir');
        $guru->guru_jk = $request->input('guru_jk');
        $guru->guru_notelp = $request->input('guru_notelp');
        $guru->guru_alamat = $request->input('guru_alamat');
        $guru->guru_username = $request->input('guru_username');
        $guru->guru_password = Hash::make($request->input('guru_password'));
        $guru->guru_jabatan = $request->input('guru_jabatan');
        $guru->guru_status = $request->input('guru_status');
        $guru->mapel_id = $request->input('mapel_id');
        $guru->save();

         // cek apakah jabatannya sebgai kepala sekolah
        if($request->input('guru_jabatan') == 'Kepala Sekolah'){
            DB::table('tb_kepsek')
                ->where('guru_id', $guru->guru_id)
                ->update([
                    'kepsek_tahun' => $request->input('kepsek_tahun')
                ]);
        }   

        return redirect()
            ->route('guru')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(GuruModel $guru)
    {
        $guru_foto = $guru->guru_foto;
        unlink('guru/' . $guru_foto);

        $guru->forceDelete();

        return redirect()
            ->route('guru')
            ->with('message', 'Data berhasil dihapus');
    }
}
