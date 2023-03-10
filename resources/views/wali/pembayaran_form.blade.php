@extends('layouts.app_sneat_wali')

@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">KONFIRMASI PEMBAYARAN</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="bank_id">Bank Tujuan Pembayaran</label>
                        {!! Form::select('bank_id', $listBank, request('bank_sekolah_id'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_bayar">Tanggal Bayar</label>
                        {!! Form::date('tanggal_bayar', $model->tanggal_bayar ?? date('Y-m-d'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_bayar') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="jumlah_dibayar">Jumlah Yang Dibayarkan</label>
                        {!! Form::text('jumlah_dibayar', null, ['class' => 'form-control rupiah']) !!}
                        <span class="text-danger">{{ $errors->first('jumlah_dibayar') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="bukti_bayar">Bukti Pembayaran</label>
                        {!! Form::file('bukti_bayar', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('bukti_bayar') }}</span>
                    </div>
                    {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
