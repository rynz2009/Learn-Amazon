@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.penerimaanCod.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penerimaan-cods.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_pcod">{{ trans('cruds.penerimaanCod.fields.kode_pcod') }}</label>
                <input class="form-control {{ $errors->has('kode_pcod') ? 'is-invalid' : '' }}" type="text" name="kode_pcod" id="kode_pcod" value="{{ old('kode_pcod', '') }}" required>
                @if($errors->has('kode_pcod'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_pcod') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penerimaanCod.fields.kode_pcod_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.penerimaanCod.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penerimaanCod.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah">{{ trans('cruds.penerimaanCod.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '0') }}" step="0.01" required>
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penerimaanCod.fields.jumlah_helper') }}</span>
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