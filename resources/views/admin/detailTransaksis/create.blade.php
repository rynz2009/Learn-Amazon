@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.detailTransaksi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.detail-transaksis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kode_transaksi_id">{{ trans('cruds.detailTransaksi.fields.kode_transaksi') }}</label>
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
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.kode_transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kode_produks">{{ trans('cruds.detailTransaksi.fields.kode_produk') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kode_produks') ? 'is-invalid' : '' }}" name="kode_produks[]" id="kode_produks" multiple required>
                    @foreach($kode_produks as $id => $kode_produk)
                        <option value="{{ $id }}" {{ in_array($id, old('kode_produks', [])) ? 'selected' : '' }}>{{ $kode_produk }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_produks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_produks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.kode_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desain">{{ trans('cruds.detailTransaksi.fields.desain') }}</label>
                <div class="needsclick dropzone {{ $errors->has('desain') ? 'is-invalid' : '' }}" id="desain-dropzone">
                </div>
                @if($errors->has('desain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.desain_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan_desain">{{ trans('cruds.detailTransaksi.fields.keterangan_desain') }}</label>
                <textarea class="form-control {{ $errors->has('keterangan_desain') ? 'is-invalid' : '' }}" name="keterangan_desain" id="keterangan_desain">{{ old('keterangan_desain') }}</textarea>
                @if($errors->has('keterangan_desain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan_desain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.keterangan_desain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="size">{{ trans('cruds.detailTransaksi.fields.size') }}</label>
                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="text" name="size" id="size" value="{{ old('size', '') }}" required>
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="warna">{{ trans('cruds.detailTransaksi.fields.warna') }}</label>
                <input class="form-control {{ $errors->has('warna') ? 'is-invalid' : '' }}" type="text" name="warna" id="warna" value="{{ old('warna', '') }}" required>
                @if($errors->has('warna'))
                    <div class="invalid-feedback">
                        {{ $errors->first('warna') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.warna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.detailTransaksi.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1">
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="harga">{{ trans('cruds.detailTransaksi.fields.harga') }}</label>
                <input class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}" type="number" name="harga" id="harga" value="{{ old('harga', '') }}" step="0.01" required>
                @if($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.harga_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kode_hpps">{{ trans('cruds.detailTransaksi.fields.kode_hpp') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kode_hpps') ? 'is-invalid' : '' }}" name="kode_hpps[]" id="kode_hpps" multiple required>
                    @foreach($kode_hpps as $id => $kode_hpp)
                        <option value="{{ $id }}" {{ in_array($id, old('kode_hpps', [])) ? 'selected' : '' }}>{{ $kode_hpp }}</option>
                    @endforeach
                </select>
                @if($errors->has('kode_hpps'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_hpps') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.detailTransaksi.fields.kode_hpp_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.desainDropzone = {
    url: '{{ route('admin.detail-transaksis.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="desain"]').remove()
      $('form').append('<input type="hidden" name="desain" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="desain"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($detailTransaksi) && $detailTransaksi->desain)
      var file = {!! json_encode($detailTransaksi->desain) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="desain" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection