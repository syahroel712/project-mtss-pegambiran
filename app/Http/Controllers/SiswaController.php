<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SiswaModel;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = SiswaModel::all();
        return view('pages/siswa/index',[
            'active' => 'siswa',
            'siswa' => $siswa,
        ]);
    }

    public function create()
    {
        return view('pages/siswa/form',[
            'active' => 'siswa',
            'url' => 'siswa',
        ]);
    }

    public function store(Request $request, SiswaModel $siswa)
    {
        $validator = Validator::make($request->all(), [
            'siswa_nis'         => 'required|numeric|unique:tb_siswa,siswa_nis', 
            'siswa_nama'        => 'required', 
            'siswa_tgl_lahir'   => 'required', 
            'siswa_jk'          => 'required', 
            'siswa_notelp'      => 'required|numeric', 
            'siswa_alamat'      => 'required', 
            'siswa_status'      => 'required', 
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('siswa.create')
                ->withErrors($validator)
                ->withInput();
        }

        $siswa->siswa_nis = $request->input('siswa_nis');
        $siswa->siswa_nama = $request->input('siswa_nama');
        $siswa->siswa_tgl_lahir = $request->input('siswa_tgl_lahir');
        $siswa->siswa_jk = $request->input('siswa_jk');
        $siswa->siswa_notelp = $request->input('siswa_notelp');
        $siswa->siswa_alamat = $request->input('siswa_alamat');
        $siswa->siswa_password = Hash::make($request->input('siswa_password'));
        $siswa->siswa_status = $request->input('siswa_status');
        $siswa->save();

        return redirect()
            ->route('siswa')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(SiswaModel $siswa)
    {
        return view(
            'pages/siswa/form',
            [
                'active' => 'siswa',
                'siswa' => $siswa,
                'url' => 'siswa.update',
            ]
        );
    }

    public function update(Request $request, SiswaModel $siswa)
    {
        $validator = Validator::make($request->all(), [
            'siswa_nis'         =>  [
                                        'required', 
                                        Rule::unique('tb_siswa')->ignore($siswa->siswa_id,'siswa_id')
                                    ], 
            'siswa_nama'        => 'required', 
            'siswa_tgl_lahir'   => 'required', 
            'siswa_jk'          => 'required', 
            'siswa_notelp'      => 'required|numeric', 
            'siswa_alamat'      => 'required', 
            'siswa_status'      => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('siswa.update', $siswa->siswa_id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('siswa_password') != null) {
            $password = $request->input('siswa_password');
            $pwd = Hash::make($password);
            $siswa->siswa_password = $pwd;
        }
        
        $siswa->siswa_nis = $request->input('siswa_nis');
        $siswa->siswa_nama = $request->input('siswa_nama');
        $siswa->siswa_tgl_lahir = $request->input('siswa_tgl_lahir');
        $siswa->siswa_jk = $request->input('siswa_jk');
        $siswa->siswa_notelp = $request->input('siswa_notelp');
        $siswa->siswa_alamat = $request->input('siswa_alamat');
        $siswa->siswa_status = $request->input('siswa_status');
        $siswa->save();

        return redirect()
            ->route('siswa')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(SiswaModel $siswa)
    {

        $siswa->forceDelete();

        return redirect()
            ->route('siswa')
            ->with('message', 'Data berhasil dihapus');
    }
}
