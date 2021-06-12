@extends('layouts.admin')
@section('content')
@can('list_product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.list-products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.listProduct.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ListProduct', 'route' => 'admin.list-products.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.listProduct.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ListProduct">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.kode_produk') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.niche') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.link_shopee') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.link_form') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listProducts as $key => $listProduct)
                        <tr data-entry-id="{{ $listProduct->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $listProduct->id ?? '' }}
                            </td>
                            <td>
                                {{ $listProduct->kode_produk ?? '' }}
                            </td>
                            <td>
                                @foreach($listProduct->niches as $key => $item)
                                    <span class="badge badge-info">{{ $item->niche }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $listProduct->name ?? '' }}
                            </td>
                            <td>
                                {{ $listProduct->description ?? '' }}
                            </td>
                            <td>
                                {{ $listProduct->price ?? '' }}
                            </td>
                            <td>
                                @if($listProduct->photo)
                                    <a href="{{ $listProduct->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $listProduct->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $listProduct->link_shopee ?? '' }}
                            </td>
                            <td>
                                {{ $listProduct->link_form ?? '' }}
                            </td>
                            <td>
                                @can('list_product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.list-products.show', $listProduct->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('list_product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.list-products.edit', $listProduct->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('list_product_delete')
                                    <form action="{{ route('admin.list-products.destroy', $listProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('list_product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.list-products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ListProduct:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection