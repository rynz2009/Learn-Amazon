@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.niche.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.niches.update", [$niche->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="niche">{{ trans('cruds.niche.fields.niche') }}</label>
                <input class="form-control {{ $errors->has('niche') ? 'is-invalid' : '' }}" type="text" name="niche" id="niche" value="{{ old('niche', $niche->niche) }}">
                @if($errors->has('niche'))
                    <div class="invalid-feedback">
                        {{ $errors->first('niche') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.niche.fields.niche_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.niche.fields.deskripsi') }}</label>
                <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $niche->deskripsi) }}">
                @if($errors->has('deskripsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deskripsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.niche.fields.deskripsi_helper') }}</span>
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