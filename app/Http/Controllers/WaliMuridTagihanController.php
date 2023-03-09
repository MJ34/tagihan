<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliMuridTagihanController extends Controller
{
    public function index()
    {
        $siswaId = Auth::user()->siswa->pluck('id');
        $data['models'] = Tagihan::whereIn('siswa_id', $siswaId)->get();

        return view('wali.tagihan_index', $data);
    }

    public function show($id)
    {
        $tagihan = Tagihan::find($id);
        $data['tagihan'] = $tagihan;
        $data['siswa'] = $tagihan->siswa;
        return view('wali.tagihan_show', $data);
    }
}
