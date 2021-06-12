@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.detailTransaksiAff.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.detail-transaksi-affs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_transaksi_id">{{ trans('cruds.detailTransaksiAff.fields.kode_transaksi') }}</label>
                <select class="form-control select2 {{ $errors->has('kode_transaksi') ? 'is-invalid' : '' }}" name="kode_transaksi_id" id="kode_transaksi_id" required>
                    @foreach($kode_transaksis as $id => $entry)
                        <option value="{{ $id }}" {{ old('kode_transaksi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_transaksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_transaksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksiAff.fields.kode_transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah">{{ trans('cruds.detailTransaksiAff.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1" required>
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksiAff.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ukuran">{{ trans('cruds.detailTransaksiAff.fields.ukuran') }}</label>
                <input class="form-control {{ $errors->has('ukuran') ? 'is-invalid' : '' }}" type="text" name="ukuran" id="ukuran" value="{{ old('ukuran', '') }}" required>
                @if($errors->has('ukuran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ukuran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksiAff.fields.ukuran_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection