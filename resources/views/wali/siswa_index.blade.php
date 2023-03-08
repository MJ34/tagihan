@extends('layouts.app_sneat_wali')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">DATA SISWA</h4>
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
                                    <th>Nama Wali Murid</th>
                                    <th>NISN</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Created By</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        @if ($item->wali->name == 'Belum ada wali murid')
                                            <td style="color: red"><b>{{ $item->wali->name }}</b></td>
                                        @else
                                            <td>{{ $item->wali->name }}</td>
                                        @endif
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->angkatan . '/' . $item->angkatan + 1 }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td style="text-align:center">

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
