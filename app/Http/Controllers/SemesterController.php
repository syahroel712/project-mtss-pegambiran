<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SemesterModel;
use DB;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = SemesterModel::all();
        return view('pages/semester/index',[
            'active' => 'semester',
            'semester' => $semester,
        ]);
    }

    public function create()
    {
        return view('pages/semester/form',[
            'active' => 'semester',
            'url' => 'semester',
        ]);
    }

    public function store(Request $request, SemesterModel $semester)
    {
        $validator = Validator::make($request->all(), [
            'semester_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('semester.create')
                ->withErrors($validator)
                ->withInput();
        }

        $semester->semester_nama = $request->input('semester_nama');
        $semester->save();

        return redirect()
            ->route('semester')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(SemesterModel $semester)
    {
        return view(
            'pages/semester/form',
            [
                'active' => 'semester',
                'semester' => $semester,
                'url' => 'semester.update',
            ]
        );
    }

    public function update(Request $request, SemesterModel $semester)
    {
        $validator = Validator::make($request->all(), [
            'semester_nama'         => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('semester.update', $semester->semester_id)
                ->withErrors($validator)
                ->withInput();
        }

        $semester->semester_nama = $request->input('semester_nama');
        $semester->save();

        return redirect()
            ->route('semester')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(SemesterModel $semester)
    {

        $semester->forceDelete();

        return redirect()
            ->route('semester')
            ->with('message', 'Data berhasil dihapus');
    }
}
