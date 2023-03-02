@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">{{ $title }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-1">
                            <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm mb-4"><i
                                    class="fa fa-add"></i>&emsp;Tambah {{ $title }}</a>
                        </div>
                        <div class="col-md-8">
                            {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mt-1">
                                    {!! Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4 col-sm-12 mt-1">
                                    {!! Form::selectRange('tahun', 2022, date('Y') + 1, request('tahun') , ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-4 col-sm-12 mt-1">
                                    <button class="btn btn-primary" type="submit">Tampil</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Status</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->nisn }}</td>
                                        <td>{{ $item->siswa->nama }}</td>
                                        <td>{{ $item->tanggal_tagihan }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td style="text-align:center">
                                            {!! Form::open([
                                                'route' => [$routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]) !!}
                                            <a href="{{ route($routePrefix . '.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>&emsp;Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i>&emsp;Hapus</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
