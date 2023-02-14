@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <img src="{{ \Storage::url($model->foto ?? 'images/no-image.png') }}" width="150" />
                        <table class="table table-striped table-sm mt-3">
                            <thead>
                                <tr>
                                    <td width="20%">ID Siswa</td><td width="5%" style="text-align: center">:</td><td>{{ $model->id }}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Nama Lengkap</td><td width="5%" style="text-align: center">:</td><td>{{ $model->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="20%">No. Induk Sekolah Nasional (NISN)</td><td width="5%" style="text-align: center; vertical-align: middle">:</td><td>{{ $model->nisn }}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Kelas / Jurusan</td><td width="5%" style="text-align: center; vertical-align: middle">:</td><td>{{ $model->kelas . ' - ' . $model->jurusan . ' - ' . $model->angkatan . '/' . $model->angkatan + 1}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Nama Wali / Orang Tua</td><td width="5%" style="text-align: center">:</td><td>{{ $model->wali->name }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
