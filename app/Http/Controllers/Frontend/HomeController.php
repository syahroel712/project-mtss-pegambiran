<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;
class HomeController extends Controller
{

    public function __construct() {
        $menu_profile = DB::table('tb_profile')
                        ->select('profile_nama', 'profile_slug')
                        ->get();

        $menu_info = DB::table('tb_info')
                    ->select('info_tipe', 'info_tipe_slug')
                    ->groupBy('info_tipe')
                    ->get();


        View::share([
            'menu_profile' => $menu_profile,
            'menu_info' => $menu_info,
        ]);
    }

    public function index()
    {
        return view('frontend/pages/home');
    }
}
