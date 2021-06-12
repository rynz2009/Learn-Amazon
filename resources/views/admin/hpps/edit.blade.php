@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hpp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hpps.update", [$hpp->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_hpp">{{ trans('cruds.hpp.fields.kode_hpp') }}</label>
                <input class="form-control {{ $errors->has('kode_hpp') ? 'is-invalid' : '' }}" type="text" name="kode_hpp" id="kode_hpp" value="{{ old('kode_hpp', $hpp->kode_hpp) }}" required>
                @if($errors->has('kode_hpp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_hpp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hpp.fields.kode_hpp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama">{{ trans('cruds.hpp.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $hpp->nama) }}">
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hpp.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="harga">{{ trans('cruds.hpp.fields.harga') }}</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', $hpp->harga) }}" step="0.01">
                @if($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hpp.fields.harga_helper') }}</span>
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