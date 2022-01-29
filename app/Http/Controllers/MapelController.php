<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MapelModel;
use DB;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = MapelModel::all();
        return view('pages/mapel/index',[
            'active' => 'mapel',
            'mapel' => $mapel,
        ]);
    }

    public function create()
    {
        return view('pages/mapel/form',[
            'active' => 'mapel',
            'url' => 'mapel',
        ]);
    }

    public function store(Request $request, MapelModel $mapel)
    {
        $validator = Validator::make($request->all(), [
            'mapel_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('mapel.create')
                ->withErrors($validator)
                ->withInput();
        }

        $mapel->mapel_nama = $request->input('mapel_nama');
        $mapel->save();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(MapelModel $mapel)
    {
        return view(
            'pages/mapel/form',
            [
                'active' => 'mapel',
                'mapel' => $mapel,
                'url' => 'mapel.update',
            ]
        );
    }

    public function update(Request $request, MapelModel $mapel)
    {
        $validator = Validator::make($request->all(), [
            'mapel_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('mapel.update', $mapel->mapel_id)
                ->withErrors($validator)
                ->withInput();
        }

        $mapel->mapel_nama = $request->input('mapel_nama');
        $mapel->save();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(MapelModel $mapel)
    {

        $mapel->forceDelete();

        return redirect()
            ->route('mapel')
            ->with('message', 'Data berhasil dihapus');
    }
}
