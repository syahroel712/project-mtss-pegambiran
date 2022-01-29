<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KelasModel;
use DB;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = KelasModel::all();
        return view('pages/kelas/index',[
            'active' => 'kelas',
            'kelas' => $kelas,
        ]);
    }

    public function create()
    {
        return view('pages/kelas/form',[
            'active' => 'kelas',
            'url' => 'kelas',
        ]);
    }

    public function store(Request $request, KelasModel $kelas)
    {
        $validator = Validator::make($request->all(), [
            'kelas_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kelas.create')
                ->withErrors($validator)
                ->withInput();
        }

        $kelas->kelas_nama = $request->input('kelas_nama');
        $kelas->save();

        return redirect()
            ->route('kelas')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(KelasModel $kelas)
    {
        return view(
            'pages/kelas/form',
            [
                'active' => 'kelas',
                'kelas' => $kelas,
                'url' => 'kelas.update',
            ]
        );
    }

    public function update(Request $request, KelasModel $kelas)
    {
        $validator = Validator::make($request->all(), [
            'kelas_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kelas.update', $kelas->kelas_id)
                ->withErrors($validator)
                ->withInput();
        }

        $kelas->kelas_nama = $request->input('kelas_nama');
        $kelas->save();

        return redirect()
            ->route('kelas')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(KelasModel $kelas)
    {

        $kelas->forceDelete();

        return redirect()
            ->route('kelas')
            ->with('message', 'Data berhasil dihapus');
    }
}
