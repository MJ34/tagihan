@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light"> <a href="{{ route('tagihan.index') }}">Data Tagihan</a> / </span> {{ $title }}</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    {{-- <div class="form-group mt-1">
                        <label for="biaya_id[]">Biaya Yang Ditagihkan</label>
                        {!! Form::select('biaya_id', $biaya, null, ['class' => 'form-control', 'multiple' => true]) !!}
                        <span class="text-danger">{{ $errors->first('biaya_id') }}</span>
                    </div> --}}
                    @foreach ($biaya as $item)
                    <div class="form-check mt-3">
                        {!! Form::checkbox('biaya_id[]', $item->id, null, [
                            'class' => 'form-check-input',
                            'id' => 'defaultCheck' . $loop->iteration,
                        ]) !!}
                        <label class="form-check-label" for="defaultCheck{{ $loop->iteration }}">
                            {{ $item->nama_biaya_full }}
                        </label>
                    </div>
                    @endforeach
                    <div class="form-group mt-3">
                        <label for="angkatan">Tagihan Untuk Angkatan</label>
                        {!! Form::select('angkatan', $angkatan, null, ['class' => 'form-control', 'placeholder' => 'Pilih Angkatan']) !!}
                        <span class="text-danger">{{ $errors->first('angkatan') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kelas">Tagihan Untuk Kelas</label>
                        {!! Form::select('kelas', $kelas, null, ['class' => 'form-control', 'placeholder' => 'Kelas']) !!}
                        <span class="text-danger">{{ $errors->first('kelas') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_tagihan">Tanggal Tagihan</label>
                        {!! Form::date('tanggal_tagihan', $model->tanggal_tagihan ?? date('Y-m-d'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_tagihan') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                        {!! Form::date('tanggal_jatuh_tempo', $model->tanggal_jatuh_tempo ?? date('Y-m-d'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_jatuh_tempo') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="keterangan">Keterangan</label>
                        {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => 3]) !!}
                        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                    </div>

                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
