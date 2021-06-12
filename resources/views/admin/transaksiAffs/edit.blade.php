@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaksiAff.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transaksi-affs.update", [$transaksiAff->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_transaksi">{{ trans('cruds.transaksiAff.fields.kode_transaksi') }}</label>
                <input class="form-control {{ $errors->has('kode_transaksi') ? 'is-invalid' : '' }}" type="text" name="kode_transaksi" id="kode_transaksi" value="{{ old('kode_transaksi', $transaksiAff->kode_transaksi) }}" required>
                @if($errors->has('kode_transaksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_transaksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.kode_transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kode_produk_id">{{ trans('cruds.transaksiAff.fields.kode_produk') }}</label>
                <select class="form-control select2 {{ $errors->has('kode_produk') ? 'is-invalid' : '' }}" name="kode_produk_id" id="kode_produk_id" required>
                    @foreach($kode_produks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kode_produk_id') ? old('kode_produk_id') : $transaksiAff->kode_produk->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.kode_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.transaksiAff.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $transaksiAff->tanggal) }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.transaksiAff.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $transaksiAff->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.transaksiAff.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat', $transaksiAff->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kota">{{ trans('cruds.transaksiAff.fields.kota') }}</label>
                <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text" name="kota" id="kota" value="{{ old('kota', $transaksiAff->kota) }}" required>
                @if($errors->has('kota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="propinsi">{{ trans('cruds.transaksiAff.fields.propinsi') }}</label>
                <input class="form-control {{ $errors->has('propinsi') ? 'is-invalid' : '' }}" type="text" name="propinsi" id="propinsi" value="{{ old('propinsi', $transaksiAff->propinsi) }}" required>
                @if($errors->has('propinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('propinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.propinsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_wa">{{ trans('cruds.transaksiAff.fields.no_wa') }}</label>
                <input class="form-control {{ $errors->has('no_wa') ? 'is-invalid' : '' }}" type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $transaksiAff->no_wa) }}" required>
                @if($errors->has('no_wa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_wa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.no_wa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.transaksiAff.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $transaksiAff->jumlah) }}" step="1">
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ongkir">{{ trans('cruds.transaksiAff.fields.ongkir') }}</label>
                <input class="form-control {{ $errors->has('ongkir') ? 'is-invalid' : '' }}" type="number" name="ongkir" id="ongkir" value="{{ old('ongkir', $transaksiAff->ongkir) }}" step="0.01">
                @if($errors->has('ongkir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ongkir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.ongkir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_awb">{{ trans('cruds.transaksiAff.fields.no_awb') }}</label>
                <input class="form-control {{ $errors->has('no_awb') ? 'is-invalid' : '' }}" type="text" name="no_awb" id="no_awb" value="{{ old('no_awb', $transaksiAff->no_awb) }}">
                @if($errors->has('no_awb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_awb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.no_awb_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transaksiAff.fields.status') }}</label>
                @foreach(App\Models\TransaksiAff::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $transaksiAff->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transaksiAff.fields.pembayaran') }}</label>
                @foreach(App\Models\TransaksiAff::PEMBAYARAN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('pembayaran') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="pembayaran_{{ $key }}" name="pembayaran" value="{{ $key }}" {{ old('pembayaran', $transaksiAff->pembayaran) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="pembayaran_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksiAff.fields.pembayaran_helper') }}</span>
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