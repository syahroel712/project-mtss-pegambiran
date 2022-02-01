<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GaleriModel;
use DB;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = GaleriModel::all();
        
        return view('pages/galeri/index', [
            'active' => 'galeri',
            'galeri' => $galeri,
        ]);
    }

    public function create()
    {
        return view('pages/galeri/form',[
            'active' => 'galeri',
            'url' => 'galeri.store',
        ]);
    }

    public function store(Request $request, GaleriModel $galeri)
    {
        $validator = Validator::make($request->all(), [
            'galeri_nama'   => 'required',
            'galeri_foto'   => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('galeri.create')
                ->withErrors($validator)
                ->withInput();
        }

        $foto = $request->file('galeri_foto');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('galeri/', $filename);

        $galeri->galeri_nama = $request->input('galeri_nama');
        $galeri->galeri_foto = $filename;
        $galeri->save();

        return redirect()
            ->route('galeri')
            ->with('message', 'Data berhasil ditambahkan');
    
    }
    public function edit(GaleriModel $galeri)
    {
        return view('pages/galeri/form',[
            'active' => 'galeri',
            'galeri'     => $galeri,
            'url' => 'galeri.update',
        ]);
    }

    public function update(Request $request, GaleriModel $galeri)
    {
        $validator = Validator::make($request->all(), [
            'galeri_nama'   => 'required',
            'galeri_foto'   => 'mimes:jpg,jpeg,png',
        ]);

        
        if ($validator->fails()) {
            return redirect()
                ->route('galeri.update', $galeri->galeri_id)
                ->withErrors($validator)
                ->withInput();
        }
        //cek tipe dari data lama dahulu
        if ($request->hasFile('galeri_foto')) {
            
            unlink('galeri/' . $galeri->galeri_foto);
            
            $foto = $request->file('galeri_foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('galeri/', $filename);
            $galeri->galeri_foto = $filename;
        }
        
        $galeri->galeri_nama = $request->input('galeri_nama');
        $galeri->save();

        return redirect()
            ->route('galeri')
            ->with('message', 'Data berhasil diedit');
    
    }
    public function destroy(GaleriModel $galeri)
    {

        $galeri_foto = $galeri->galeri_foto;
        unlink('galeri/' . $galeri_foto);
        
        $galeri->forceDelete();
        
        return redirect()
            ->route('galeri')
            ->with('message', 'Data berhasil dihapus');
    }
}
