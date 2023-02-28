@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">{{ $title }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm mb-4"><i class="fa fa-add"></i>&emsp;Tambah {{ $title }}</a>
                    {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                        <div class="input-group">
                            <input name="q" type="text" class="form-control" placeholder="Cari Nama Biaya" aria-label="nama biaya" aria-describedby="button-addon2" value="{{ request('q') }}">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bx bx-search"></i></button>
                        </div>
                    {!! Form::close() !!}
                    <div class="table-responsive">
                        <table class="table table-striped mb-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Biaya</th>
                                    <th>Jumlah</th>
                                    <th>Created By</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->user->name }}</td>
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
