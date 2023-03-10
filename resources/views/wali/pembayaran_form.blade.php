@extends('layouts.app_sneat_wali')
@section('js')
<script>
    $(document).ready(function() {
        $("#pilih_bank").change(function(e) {
            var bankId = $(this).find(":selected").val();
            window.location.href = "{!! $url !!}&bank_sekolah_id=" + bankId;

        });
    });
</script>
@endsection
@section('content')
    <div class="row justify-content-center">
        <h4 class="fw-bold py-1 mb-4">KONFIRMASI PEMBAYARAN</h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="bank_id">Bank Tujuan Pembayaran</label>
                        {!! Form::select('bank_id', $listBank, request('bank_sekolah_id'), [
                            'class' => 'form-control',
                            'placeholder' => 'Pilih Bank Tujuan Transfer',
                            'id' => 'pilih_bank',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                    </div>
                    @if (request('bank_sekolah_id') != '')
                        <div class="alert alert-primary mt-2 mb-2" role="alert">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td width="18%">Bank Tujuan</td>
                                        <td>: {{ $bankYangDipilih->nama_bank }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening</td>
                                        <td>: {{ $bankYangDipilih->nomor_rekening }}</td>
                                    </tr>
                                    <tr>
                                        <td>Atas Nama</td>
                                        <td>: {{ $bankYangDipilih->nama_rekening }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
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
