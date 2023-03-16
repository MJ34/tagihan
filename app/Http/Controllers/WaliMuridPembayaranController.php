<?php

namespace App\Http\Controllers;

use App\Models\BankSekolah;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\WaliBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliMuridPembayaranController extends Controller
{
    public function create(Request $request)
    {
        $data['listWaliBank'] = WaliBank::where('wali_id', Auth::user()->id)->get()->pluck('nama_bank_full', 'id');
        $data['tagihan'] = Tagihan::waliSiswa()->findOrFail($request->tagihan_id);
        $data['model'] = new Pembayaran();
        $data['method'] = 'POST';
        $data['route'] = 'wali.pembayaran.store';
        $data['listBank'] = BankSekolah::pluck('nama_bank', 'id');
        if ($request->bank_sekolah_id != '') {
            $data['bankYangDipilih'] = BankSekolah::findOrFail($request->bank_sekolah_id);
        }
        $data['url'] = route('wali.pembayaran.create', [
            'tagihan_id' => $request->tagihan_id,
        ]);

        return view('wali.pembayaran_form', $data);
    }

    public function store(Request $request)
    {
        if ($request->filled('pilihan_bank')) {
            //wali membuat rekening baru
            $bankId = $request->bank_id;
            if ($request->filled('simpan_data_rekening')) {
                $requestDataBank = $request->validate([
                    'nama_rekening' => 'required',
                    'kode' => 'required',
                    'nama_bank' => 'required',
                    'nomor_rekening' => 'required',
                ]);
                $waliBank = WaliBank::firstOrCreate(
                    $requestDataBank,
                    [
                        'nama_rekening' => $requestDataBank['nama_rekening'],
                        'nomor_rekening' => $requestDataBank['nomor_rekening'],
                        'wali_id' => Auth::user()->id,
                        'kode' => $requestDataBank['kode'],
                        'nama_bank' => $requestDataBank['nama_bank'],
                    ]
                );
            }
        } else {
            $waliBankId = $request->wali_bank_id;
            $waliBank = WaliBank::findOrFail($waliBankId);
        }
       // dd($waliBank);
    }
}
