@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light"> Data Bank Sekolah / </span> {{ $title }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group mt-1">
                        <lable for="kode">Kode</lable>
                        {!! Form::text('kode', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('kode') }}</span>
                    </div>
                    <div class="form-group mt-1">
                        <lable for="nama_bank">Nama Bank</lable>
                        {!! Form::text('nama_bank', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama_bank') }}</span>
                    </div>
                    <div class="form-group mt-1">
                        <lable for="nama_rekening">Nama Rekening</lable>
                        {!! Form::text('nama_rekening', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama_rekening') }}</span>
                    </div>
                    <div class="form-group mt-1">
                        <lable for="nomor_rekening">Nomor Rekening</lable>
                        {!! Form::text('nomor_rekening', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nomor_rekening') }}</span>
                    </div>

                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
