@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.belanja.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.belanjas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.belanja.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode_hpps">{{ trans('cruds.belanja.fields.kode_hpp') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kode_hpps') ? 'is-invalid' : '' }}" name="kode_hpps[]" id="kode_hpps" multiple>
                    @foreach($kode_hpps as $id => $kode_hpp)
                        <option value="{{ $id }}" {{ in_array($id, old('kode_hpps', [])) ? 'selected' : '' }}>{{ $kode_hpp }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_hpps'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_hpps') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.kode_hpp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_barang">{{ trans('cruds.belanja.fields.nama_barang') }}</label>
                <input class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', '') }}" required>
                @if($errors->has('nama_barang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_barang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.nama_barang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah_barang">{{ trans('cruds.belanja.fields.jumlah_barang') }}</label>
                <input class="form-control {{ $errors->has('jumlah_barang') ? 'is-invalid' : '' }}" type="number" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang', '') }}" step="1" required>
                @if($errors->has('jumlah_barang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_barang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.jumlah_barang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="harga">{{ trans('cruds.belanja.fields.harga') }}</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', '') }}" step="0.01" required>
                @if($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.harga_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.belanja.fields.keterangan') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                @if($errors->has('keterangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.belanja.fields.sumber_bayar') }}</label>
                @foreach(App\Models\Belanja::SUMBER_BAYAR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sumber_bayar') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sumber_bayar_{{ $key }}" name="sumber_bayar" value="{{ $key }}" {{ old('sumber_bayar', 'CASH') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sumber_bayar_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sumber_bayar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sumber_bayar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.sumber_bayar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.belanja.fields.type_belanja') }}</label>
                @foreach(App\Models\Belanja::TYPE_BELANJA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type_belanja') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_belanja_{{ $key }}" name="type_belanja" value="{{ $key }}" {{ old('type_belanja', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="type_belanja_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type_belanja'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_belanja') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.belanja.fields.type_belanja_helper') }}</span>
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