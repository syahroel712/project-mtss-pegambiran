<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SliderModel;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $slider = SliderModel::all();
        
        return view('pages/slider/index', [
            'active' => 'slider',
            'slider' => $slider,
        ]);
    }

    public function create()
    {
        return view('pages/slider/form',[
            'active' => 'slider',
            'url' => 'slider.store',
        ]);
    }

    public function store(Request $request, SliderModel $slider)
    {
        $validator = Validator::make($request->all(), [
            'slider_nama'   => 'required',
            'slider_foto'   => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('slider.create')
                ->withErrors($validator)
                ->withInput();
        }

        $foto = $request->file('slider_foto');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('slider/', $filename);

        $slider->slider_nama = $request->input('slider_nama');
        $slider->slider_foto = $filename;
        $slider->save();

        return redirect()
            ->route('slider')
            ->with('message', 'Data berhasil ditambahkan');
    
    }
    public function edit(SliderModel $slider)
    {
        return view('pages/slider/form',[
            'active' => 'slider',
            'slider'     => $slider,
            'url' => 'slider.update',
        ]);
    }

    public function update(Request $request, SliderModel $slider)
    {
        $validator = Validator::make($request->all(), [
            'slider_nama'   => 'required',
            'slider_foto'   => 'mimes:jpg,jpeg,png',
        ]);

        
        if ($validator->fails()) {
            return redirect()
                ->route('slider.update', $slider->slider_id)
                ->withErrors($validator)
                ->withInput();
        }
        //cek tipe dari data lama dahulu
        if ($request->hasFile('slider_foto')) {
            
            unlink('slider/' . $slider->slider_foto);
            
            $foto = $request->file('slider_foto');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('slider/', $filename);
            $slider->slider_foto = $filename;
        }
        
        $slider->slider_nama = $request->input('slider_nama');
        $slider->save();

        return redirect()
            ->route('slider')
            ->with('message', 'Data berhasil diedit');
    
    }
    public function destroy(SliderModel $slider)
    {

        $slider_foto = $slider->slider_foto;
        unlink('slider/' . $slider_foto);
        
        $slider->forceDelete();
        
        return redirect()
            ->route('slider')
            ->with('message', 'Data berhasil dihapus');
    }
}
