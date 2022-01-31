<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\InfoModel;
use DB;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function index()
    {
        $info = InfoModel::all();
        
        return view('pages/info/index', [
            'active' => 'info',
            'info' => $info,
        ]);
    }

    public function create()
    {
        return view('pages/info/form',[
            'active' => 'info',
            'url' => 'info.store',
        ]);
    }

    public function store(Request $request, InfoModel $info)
    {
        $validator = Validator::make($request->all(), [
            'info_judul'   => 'required',
            'info_tipe'   => 'required',
            'info_foto'   => 'required|mimes:jpg,jpeg,png',
            'info_desk'   => 'required',
            'info_tgl'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('info.create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('info_foto')) {
            $foto = $request->file('info_foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('info/', $filename);
            $info->info_foto = $filename;
        }else{
            $info->info_foto = 'default.png';
        }

        $info->info_judul = $request->input('info_judul');
        $info->info_slug = Str::slug($request->input('info_judul'), '-');
        $info->info_tipe = $request->input('info_tipe');
        $info->info_tipe_slug = Str::slug($request->input('info_tipe'), '-');
        $info->info_desk = $request->input('info_desk');
        $info->info_tgl = $request->input('info_tgl');
        $info->save();

        return redirect()
            ->route('info')
            ->with('message', 'Data berhasil ditambahkan');
    
    }
    public function edit(InfoModel $info)
    {
        return view('pages/info/form',[
            'active' => 'info',
            'info'     => $info,
            'url' => 'info.update',
        ]);
    }

    public function update(Request $request, InfoModel $info)
    {
        $validator = Validator::make($request->all(), [
            'info_judul'   => 'required',
            'info_tipe'   => 'required',
            'info_foto'   => 'mimes:jpg,jpeg,png',
            'info_desk'   => 'required',
            'info_tgl'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('info.update', $info->info_id)
                ->withErrors($validator)
                ->withInput();
        }
        //cek tipe dari data lama dahulu
        if ($request->hasFile('info_foto')) {
            if($info->info_foto != 'default.png'){
                unlink('info/' . $info->info_foto);
            }
            $foto = $request->file('info_foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('info/', $filename);
            $info->info_foto = $filename;
        }
        
        $info->info_judul = $request->input('info_judul');
        $info->info_slug = Str::slug($request->input('info_judul'), '-');
        $info->info_tipe = $request->input('info_tipe');
        $info->info_tipe_slug = Str::slug($request->input('info_tipe'), '-');
        $info->info_desk = $request->input('info_desk');
        $info->info_tgl = $request->input('info_tgl');
        $info->save();

        return redirect()
            ->route('info')
            ->with('message', 'Data berhasil diedit');
    
    }
    public function destroy(InfoModel $info)
    {

        $info_foto = $info->info_foto;
        if($info_foto != 'default.png'){
            unlink('info/' . $info_foto);
        }
        
        $info->forceDelete();
        
        return redirect()
            ->route('info')
            ->with('message', 'Data berhasil dihapus');
    }
}
