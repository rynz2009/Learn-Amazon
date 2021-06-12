@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.listProduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.list-products.update", [$listProduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kode_produk">{{ trans('cruds.listProduct.fields.kode_produk') }}</label>
                <input class="form-control {{ $errors->has('kode_produk') ? 'is-invalid' : '' }}" type="text" name="kode_produk" id="kode_produk" value="{{ old('kode_produk', $listProduct->kode_produk) }}" required>
                @if($errors->has('kode_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.kode_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="niches">{{ trans('cruds.listProduct.fields.niche') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('niches') ? 'is-invalid' : '' }}" name="niches[]" id="niches" multiple required>
                    @foreach($niches as $id => $niche)
                        <option value="{{ $id }}" {{ (in_array($id, old('niches', [])) || $listProduct->niches->contains($id)) ? 'selected' : '' }}>{{ $niche }}</option>
                    @endforeach
                </select>
                @if($errors->has('niches'))
                    <div class="invalid-feedback">
                        {{ $errors->first('niches') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.niche_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.listProduct.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $listProduct->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.listProduct.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $listProduct->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.listProduct.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $listProduct->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.listProduct.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_shopee">{{ trans('cruds.listProduct.fields.link_shopee') }}</label>
                <input class="form-control {{ $errors->has('link_shopee') ? 'is-invalid' : '' }}" type="text" name="link_shopee" id="link_shopee" value="{{ old('link_shopee', $listProduct->link_shopee) }}">
                @if($errors->has('link_shopee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_shopee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.link_shopee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_form">{{ trans('cruds.listProduct.fields.link_form') }}</label>
                <input class="form-control {{ $errors->has('link_form') ? 'is-invalid' : '' }}" type="text" name="link_form" id="link_form" value="{{ old('link_form', $listProduct->link_form) }}">
                @if($errors->has('link_form'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_form') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listProduct.fields.link_form_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.list-products.storeMedia') }}',
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($listProduct) && $listProduct->photo)
      var file = {!! json_encode($listProduct->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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