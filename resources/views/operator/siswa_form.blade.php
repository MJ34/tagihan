@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>

                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                        <div class="form-group">
                            <lable for="wali_id">Wali Murid (optional)</lable>
                            {{ Form::select('wali_id', $wali, null, ['class' => 'form-control select2', 'placeholder' => 'Pilih Wali Murid']) }}
                            <span class="text-danger">{{ $errors->first('wali_id') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="nama">Nama Siswa</lable>
                            {!! Form::text('nama', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="nisn">NISN</lable>
                            {!! Form::text('nisn', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="jurusan">Pilih Jurusan</lable>
                            {!! Form::select(
                                'jurusan', [
                                'RPL' => 'Rekayasa Perangkat Lunak',
                                'AP' => 'Aplikasi Perkantoran',
                                'TKJ' => 'Teknik Komputer & Jaringan',
                                ],
                                null,
                                ['class' => 'form-control', 'placeholder' => 'Pilih Jurusan']
                            ) !!}
                            <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="kelas">Pilih Kelas</lable>
                            {!! Form::selectRange('kelas', 1, 12, null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Pilih Kelas']) !!}
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <lable for="angkatan">Angkatan Ke-</lable>
                            {!! Form::selectRange('angkatan', 2022, date('Y') + 1, null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Pilih Angkatan']) !!}
                            <span class="text-danger">{{ $errors->first('angkatan') }}</span>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <lable for="foto">Photo <b>(Format:jpg, jpeg, png, Ukuran Maks: 5MB)</b></lable>
                            {{ Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) }}
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        </div>
                        @if ($model->foto != null)
                            <img src="{{ \Storage::url($model->foto) }}" alt="" width="200" class="img-thumbnail"/>
                        @endif
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
