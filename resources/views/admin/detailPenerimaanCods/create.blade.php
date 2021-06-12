@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.detailPenerimaanCod.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.detail-penerimaan-cods.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_pcods">{{ trans('cruds.detailPenerimaanCod.fields.kode_pcod') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kode_pcods') ? 'is-invalid' : '' }}" name="kode_pcods[]" id="kode_pcods" multiple required>
                    @foreach($kode_pcods as $id => $kode_pcod)
                        <option value="{{ $id }}" {{ in_array($id, old('kode_pcods', [])) ? 'selected' : '' }}>{{ $kode_pcod }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_pcods'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_pcods') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailPenerimaanCod.fields.kode_pcod_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="awb">{{ trans('cruds.detailPenerimaanCod.fields.awb') }}</label>
                <input class="form-control {{ $errors->has('awb') ? 'is-invalid' : '' }}" type="text" name="awb" id="awb" value="{{ old('awb', '') }}" required>
                @if($errors->has('awb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('awb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailPenerimaanCod.fields.awb_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nilai_awb">{{ trans('cruds.detailPenerimaanCod.fields.nilai_awb') }}</label>
                <input class="form-control {{ $errors->has('nilai_awb') ? 'is-invalid' : '' }}" type="number" name="nilai_awb" id="nilai_awb" value="{{ old('nilai_awb', '0') }}" step="0.01" required>
                @if($errors->has('nilai_awb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nilai_awb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailPenerimaanCod.fields.nilai_awb_helper') }}</span>
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