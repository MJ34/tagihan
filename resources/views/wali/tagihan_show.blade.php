@extends('layouts.app_sneat_wali')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">TAGIHAN SPP {{ strtoupper($siswa->nama) }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td rowspan="8" width="100">
                                        <img src="{{ \Storage::url($model->foto ?? 'images/no-image.jpg') }}"
                                            alt="{{ $siswa->nama }}" width="150">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50">NISN</td>
                                    <td>: {{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>: {{ $siswa->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>: {{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>: {{ $siswa->angkatan }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6 col-sm-1">
                            <table>
                                <tr>
                                    <td>No. tagihan</td>
                                    <td>: #SDNS-{{ $tagihan->id }}</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Tagihan</td>
                                    <td>: {{ $tagihan->tanggal_tagihan->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Jatuh Tempo</td>
                                    <td>: {{ $tagihan->tanggal_jatuh_tempo->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>: {{ $tagihan->getStatusTagihanWali() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="" target="blank"><i class="fa fa-file-pdf"></i> Cetak Invoice
                                            Tagihan</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <table class="table table-sm table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama Tagihan</td>
                                <td class="text-end">Jumlah Tagihan</td>
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
                                <td class="text-end"> {{ formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya')) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="alert alert-secondary mt-4" role="alert" style="color: black">
                        Pembayaran Bisa dilakukan dengan cara langsung ke Operator sekolah atau di transfer melalui rekening
                        milik sekolah ini. <br />
                        <u><i>Jangan Melakukan transfer ke rekening selain Rekening dibawah ini.</i></u>
                        <br />
                        Silahkan lihat tata cara melakukan pembayaran melalui <a href="">ATM</a> atau <a
                            href="">Internet Banking</a> <br />
                        Setelah melakukan pembayaran, silahkan upload bukti pembayaran melalui tombol konfirmasi yang ada di
                        bawah ini:
                    </div>
                    <ul>
                        <li><a href="http://">Lihat Cara Pembayaran Melalui ATM</a></li>
                        <li><a href="http://">Lihat Cara Pembayaran Melalui internet Banking</a></li>
                    </ul>
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
