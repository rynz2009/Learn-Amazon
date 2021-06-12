@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.produk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.produks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_produk">{{ trans('cruds.produk.fields.kode_produk') }}</label>
                <input class="form-control {{ $errors->has('kode_produk') ? 'is-invalid' : '' }}" type="text" name="kode_produk" id="kode_produk" value="{{ old('kode_produk', '') }}" required>
                @if($errors->has('kode_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.produk.fields.kode_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_produk">{{ trans('cruds.produk.fields.nama_produk') }}</label>
                <input class="form-control {{ $errors->has('nama_produk') ? 'is-invalid' : '' }}" type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', '') }}" required>
                @if($errors->has('nama_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.produk.fields.nama_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.produk.fields.deskripsi') }}</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                @if($errors->has('deskripsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deskripsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.produk.fields.deskripsi_helper') }}</span>
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