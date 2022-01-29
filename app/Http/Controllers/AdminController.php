<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $admin = AdminModel::all();
        return view('pages/admin/index',[
            'active' => 'admin',
            'admin' => $admin,
        ]);
    }

    public function create()
    {
        return view('pages/admin/form',[
            'active' => 'admin',
            'url' => 'admin',
        ]);
    }

    public function store(Request $request, AdminModel $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'     => 'required', 
            'admin_jk'   => 'required', 
            'admin_notelp'   => 'required', 
            'admin_alamat'   => 'required', 
            'admin_username'     => 'required', 
            'admin_password'     => 'required', 
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        }

        $admin->admin_nama = $request->input('admin_nama');
        $admin->admin_jk = $request->input('admin_jk');
        $admin->admin_notelp = $request->input('admin_notelp');
        $admin->admin_alamat = $request->input('admin_alamat');
        $admin->admin_username = $request->input('admin_username');
        $admin->admin_password = Hash::make($request->input('admin_password'));
        $admin->save();
        
        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil ditambahkan');
    
    }

    public function edit(AdminModel $admin)
    {
        return view(
            'pages/admin/form',
            [
                'active' => 'admin',
                'url' => 'admin.update',
                'admin' => $admin,
            ]
        );
    }

    public function update(Request $request, AdminModel $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'     => 'required', 
            'admin_jk'   => 'required', 
            'admin_notelp'   => 'required', 
            'admin_alamat'   => 'required', 
            'admin_username'     => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.update', $admin->admin_id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->input('admin_password') != null) {
            $password = $request->input('admin_password');
            $pwd = Hash::make($password);
            $admin->admin_password = $pwd;
        }

        $admin->admin_nama = $request->input('admin_nama');
        $admin->admin_jk = $request->input('admin_jk');
        $admin->admin_notelp = $request->input('admin_notelp');
        $admin->admin_alamat = $request->input('admin_alamat');
        $admin->admin_username = $request->input('admin_username');
        $admin->save();

        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil diedit');
    }

    public function destroy(AdminModel $admin)
    {

        $admin->forceDelete();

        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil dihapus');
    }
}
