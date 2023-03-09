@extends('layouts.app_sneat_wali')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">DATA TAGIHAN</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="" class="btn btn-primary btn-sm mb-4"><i
                                    class="fa fa-add"></i>&emsp;Tambah Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status Pembayaran</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->nama }}</td>
                                        <td>{{ $item->siswa->jurusan }}</td>
                                        <td>{{ $item->siswa->kelas }}</td>
                                        <td>{{ $item->tanggal_tagihan->translatedFormat('l d-M-Y') }}</td>
                                        <td>{{ $item->tanggal_jatuh_tempo->translatedFormat('l d-M-Y') }}</td>
                                        <td>{{ $item->getStatusTagihanWali() }}</td>
                                        <td style="text-align:center">
                                            @if ($item->status == 'baru' || $item->status == 'angsur')
                                            <a href="" class="btn btn-primary">Lakukan Pembayaran</a>
                                            @else
                                            <a href="#" class="btn btn-success">Pembayaran Sudah Lunas</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
