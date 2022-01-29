<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KepsekModel;
use DB;

class KepsekController extends Controller
{
    public function index()
    {
        $kepsek = DB::table('tb_kepsek')
                    ->join('tb_guru', 'tb_kepsek.guru_id', 'tb_guru.guru_id')
                    ->select('tb_guru.guru_nama','tb_guru.guru_nip', 'tb_kepsek.*')
                    ->orderBy('tb_kepsek.kepsek_tahun', 'DESC')
                    ->get();

        return view('pages/kepsek/index',[
            'active' => 'kepsek',
            'kepsek' => $kepsek,
        ]);
    }

    public function create()
    {
        return view('pages/kepsek/form',[
            'active' => 'kepsek',
            'url' => 'kepsek',
        ]);
    }

    public function store(Request $request, KepsekModel $kepsek)
    {
        $validator = Validator::make($request->all(), [
            'kepsek_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kepsek.create')
                ->withErrors($validator)
                ->withInput();
        }

        $kepsek->kepsek_nama = $request->input('kepsek_nama');
        $kepsek->save();

        return redirect()
            ->route('kepsek')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(KepsekModel $kepsek)
    {
        return view(
            'pages/kepsek/form',
            [
                'active' => 'kepsek',
                'kepsek' => $kepsek,
                'url' => 'kepsek.update',
            ]
        );
    }

    public function update(Request $request, KepsekModel $kepsek)
    {
        $validator = Validator::make($request->all(), [
            'kepsek_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kepsek.update', $kepsek->kepsek_id)
                ->withErrors($validator)
                ->withInput();
        }

        $kepsek->kepsek_nama = $request->input('kepsek_nama');
        $kepsek->save();

        return redirect()
            ->route('kepsek')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(KepsekModel $kepsek)
    {

        $kepsek->forceDelete();

        return redirect()
            ->route('kepsek')
            ->with('message', 'Data berhasil dihapus');
    }
}
