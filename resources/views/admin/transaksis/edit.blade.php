@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaksi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transaksis.update", [$transaksi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_transaksi">{{ trans('cruds.transaksi.fields.kode_transaksi') }}</label>
                <input class="form-control {{ $errors->has('kode_transaksi') ? 'is-invalid' : '' }}" type="text" name="kode_transaksi" id="kode_transaksi" value="{{ old('kode_transaksi', $transaksi->kode_transaksi) }}" required>
                @if($errors->has('kode_transaksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_transaksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.kode_transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kode_cs">{{ trans('cruds.transaksi.fields.kode_cs') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kode_cs') ? 'is-invalid' : '' }}" name="kode_cs[]" id="kode_cs" multiple required>
                    @foreach($kode_cs as $id => $kode_cs)
                        <option value="{{ $id }}" {{ (in_array($id, old('kode_cs', [])) || $transaksi->kode_cs->contains($id)) ? 'selected' : '' }}>{{ $kode_cs }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_cs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_cs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.kode_cs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.transaksi.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $transaksi->tanggal) }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.transaksi.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $transaksi->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_wa">{{ trans('cruds.transaksi.fields.no_wa') }}</label>
                <input class="form-control {{ $errors->has('no_wa') ? 'is-invalid' : '' }}" type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $transaksi->no_wa) }}" required>
                @if($errors->has('no_wa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_wa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.no_wa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.transaksi.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat', $transaksi->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="propinsi">{{ trans('cruds.transaksi.fields.propinsi') }}</label>
                <input class="form-control {{ $errors->has('propinsi') ? 'is-invalid' : '' }}" type="text" name="propinsi" id="propinsi" value="{{ old('propinsi', $transaksi->propinsi) }}">
                @if($errors->has('propinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('propinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.propinsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kota">{{ trans('cruds.transaksi.fields.kota') }}</label>
                <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text" name="kota" id="kota" value="{{ old('kota', $transaksi->kota) }}">
                @if($errors->has('kota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kecamatan">{{ trans('cruds.transaksi.fields.kecamatan') }}</label>
                <input class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $transaksi->kecamatan) }}">
                @if($errors->has('kecamatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kecamatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.kecamatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ongkir">{{ trans('cruds.transaksi.fields.ongkir') }}</label>
                <input class="form-control {{ $errors->has('ongkir') ? 'is-invalid' : '' }}" type="number" name="ongkir" id="ongkir" value="{{ old('ongkir', $transaksi->ongkir) }}" step="0.01">
                @if($errors->has('ongkir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ongkir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.ongkir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_awb">{{ trans('cruds.transaksi.fields.no_awb') }}</label>
                <input class="form-control {{ $errors->has('no_awb') ? 'is-invalid' : '' }}" type="text" name="no_awb" id="no_awb" value="{{ old('no_awb', $transaksi->no_awb) }}">
                @if($errors->has('no_awb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_awb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.no_awb_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaksi.fields.status') }}</label>
                @foreach(App\Models\Transaksi::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $transaksi->status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.transaksi.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                @if($errors->has('keterangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaksi.fields.pembayaran') }}</label>
                @foreach(App\Models\Transaksi::PEMBAYARAN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('pembayaran') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="pembayaran_{{ $key }}" name="pembayaran" value="{{ $key }}" {{ old('pembayaran', $transaksi->pembayaran) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="pembayaran_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaksi.fields.pembayaran_helper') }}</span>
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