<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileModel;
use DB;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function index()
    {
        $profile = ProfileModel::all();
        
        return view('pages/profile/index', [
            'active' => 'profile',
            'profile' => $profile,
        ]);
    }

    public function create()
    {
        return view('pages/profile/form',[
            'active' => 'profile',
            'url' => 'profile.store',
        ]);
    }

    public function store(Request $request, ProfileModel $profile)
    {
        $validator = Validator::make($request->all(), [
            'profile_nama'   => 'required',
            'profile_tipe'   => 'required',
            'profile_desk'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.create')
                ->withErrors($validator)
                ->withInput();
        }
        
        if($request->profile_tipe == 'file'){
            $foto = $request->file('profile_desk');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('profile/', $filename);
        }elseif($request->profile_tipe == 'teks'){
            $filename = $request->input('profile_desk');
        }

        $profile->profile_nama = $request->input('profile_nama');
        $profile->profile_slug = Str::slug($request->input('profile_nama'), '-');
        $profile->profile_tipe = $request->input('profile_tipe');
        $profile->profile_desk = $filename;
        $profile->save();

        return redirect()
            ->route('profile')
            ->with('message', 'Data berhasil ditambahkan');
    
    }
    public function edit(ProfileModel $profile)
    {
        return view('pages/profile/form',[
            'active' => 'profile',
            'profile'     => $profile,
            'url' => 'profile.update',
        ]);
    }

    public function update(Request $request, ProfileModel $profile)
    {
        $validator = Validator::make($request->all(), [
            'profile_nama'   => 'required',
            'profile_tipe'   => 'required',
            'profile_desk'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.update', $profile->profile_id)
                ->withErrors($validator)
                ->withInput();
        }
        //cek tipe dari data lama dahulu
        if($profile->profile_tipe == 'file'){
            if($request->profile_tipe == 'file'){
                // cek apakah user kirim gambar lagi/tidak
                if ($request->hasFile('profile_desk')) {
                    // cari nama foto lama lalu hapus
                    unlink('profile/' . $profile->profile_desk);

                    $foto = $request->file('profile_desk');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('profile/', $filename);

                    $profile->profile_desk = $filename;
                }
            }else{
                unlink('profile/' . $profile->profile_desk);

                $profile->profile_desk = $request->input('profile_desk');
            }
        }else{
            if($request->profile_tipe == 'file'){
                // cek apakah user kirim gambar lagi/tidak
                if ($request->hasFile('profile_desk')) {

                    $foto = $request->file('profile_desk');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('profile/', $filename);

                    $profile->profile_desk = $filename;
                }
            }else{
                $profile->profile_desk = $request->input('profile_desk');
            }
        }


        $profile->profile_nama = $request->input('profile_nama');
        $profile->profile_slug = Str::slug($request->input('profile_nama'), '-');
        $profile->profile_tipe = $request->input('profile_tipe');
        $profile->save();

        return redirect()
            ->route('profile')
            ->with('message', 'Data berhasil diedit');
    
    }
    public function destroy(ProfileModel $profile)
    {

        if($profile->profile_tipe == 'file'){
            unlink('profile/' . $profile_desk);
        }
        
        $profile->forceDelete();
        
        return redirect()
            ->route('profile')
            ->with('message', 'Data berhasil dihapus');
    }

}
