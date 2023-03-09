@extends('layouts.app_sneat_wali')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">TAGIHAN SPP {{ strtoupper($siswa->nama) }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tagihan</th>
                                <th class="text-end">Jumlah Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan->tagihanDetails as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_biaya }}</td>
                                    <td class="text-end">{{ $item->formatRupiah('jumlah_biaya') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center fw-bold">Total Pembayaran</td>
                                <td class="text-end"> {{ formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya')) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="alert alert-secondary mt-4" role="alert">
                        Pembayaran Bisa dilakukan dengan cara langsung ke Operator sekolah atau di transfer melalui bank
                        milik sekolah berikut: <br />
                        <ul>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
