<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TahunAjarModel;
use DB;

class TahunAjarController extends Controller
{
    public function index()
    {
        $tahunAjar = TahunAjarModel::all();
        return view('pages/tahun-ajar/index',[
            'active' => 'tahunAjar',
            'tahunAjar' => $tahunAjar,
        ]);
    }

    public function create()
    {
        return view('pages/tahun-ajar/form',[
            'active' => 'tahunAjar',
            'url' => 'tahunAjar',
        ]);
    }

    public function store(Request $request, TahunAjarModel $tahunAjar)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajar_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('tahunajar.create')
                ->withErrors($validator)
                ->withInput();
        }

        $tahunAjar->tahun_ajar_nama = $request->input('tahun_ajar_nama');
        $tahunAjar->save();

        return redirect()
            ->route('tahunAjar')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(TahunAjarModel $tahunAjar)
    {
        return view(
            'pages/tahun-ajar/form',
            [
                'active' => 'tahunAjar',
                'tahunAjar' => $tahunAjar,
                'url' => 'tahunAjar.update',
            ]
        );
    }

    public function update(Request $request, TahunAjarModel $tahunAjar)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajar_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('tahunAjar.update', $tahunAjar->tahun_ajar_id)
                ->withErrors($validator)
                ->withInput();
        }

        $tahunAjar->tahun_ajar_nama = $request->input('tahun_ajar_nama');
        $tahunAjar->save();

        return redirect()
            ->route('tahunAjar')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(TahunAjarModel $tahunAjar)
    {

        $tahunAjar->forceDelete();

        return redirect()
            ->route('tahunAjar')
            ->with('message', 'Data berhasil dihapus');
    }
}
