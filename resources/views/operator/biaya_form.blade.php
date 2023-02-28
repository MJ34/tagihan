@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light"> Data Biaya / </span> {{ $title }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group mt-1">
                        <lable for="nama">Nama Biaya</lable>
                        {!! Form::text('nama', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <lable for="jumlah">Jumlah / Nominal</lable>
                        {!! Form::text('jumlah', null, ['class' => 'form-control rupiah']) !!}
                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                    </div>

                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
