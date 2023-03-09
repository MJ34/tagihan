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
                    <div class="alert alert-secondary mt-4" role="alert" style="color: black">
                        Pembayaran Bisa dilakukan dengan cara langsung ke Operator sekolah atau di transfer melalui rekening milik sekolah ini. <br />
                        Jangan Melakukan transfer ke rekening selain Rekening dibawah ini
                    </div>
                    <ul>
                        <li><a href="http://">Lihat Cara Pembayaran Melalui ATM</a></li>
                        <li><a href="http://">Lihat Cara Pembayaran Melalui internet Banking</a></li>
                    </ul>
                    Setelah melakukan pembayaran, silahkan upoload bukti pembayaran melalui tombol konfirmasi yang ada di bawah ini: 
                    <div class="row">
                        @foreach ($bankSekolah as $itemBank)
                        <div class="col-md-6">
                            <div class="alert alert-info" role="alert">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td width="40%">Bank Tujuan</td>
                                            <td>: {{ $itemBank->nama_bank }}</td>
                                        </tr>
                                        <tr>
                                            <td width="40%">Nomor Rekening</td>
                                            <td>: {{ $itemBank->nomor_rekening }}</td>
                                        </tr>
                                        <tr>
                                            <td width="40%">Atas Nama</td>
                                            <td>: {{ $itemBank->nama_rekening }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="" class="btn btn-primary btn-sm mt-3">Konfirmasi Pembayaran</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
