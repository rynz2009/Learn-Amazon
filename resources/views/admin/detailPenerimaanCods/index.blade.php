@extends('layouts.admin')
@section('content')
@can('detail_penerimaan_cod_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.detail-penerimaan-cods.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.detailPenerimaanCod.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.detailPenerimaanCod.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DetailPenerimaanCod">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.kode_pcod') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.awb') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailPenerimaanCod.fields.nilai_awb') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailPenerimaanCods as $key => $detailPenerimaanCod)
                        <tr data-entry-id="{{ $detailPenerimaanCod->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $detailPenerimaanCod->id ?? '' }}
                            </td>
                            <td>
                                @foreach($detailPenerimaanCod->kode_pcods as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_pcod }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $detailPenerimaanCod->awb ?? '' }}
                            </td>
                            <td>
                                {{ $detailPenerimaanCod->nilai_awb ?? '' }}
                            </td>
                            <td>
                                @can('detail_penerimaan_cod_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.detail-penerimaan-cods.show', $detailPenerimaanCod->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('detail_penerimaan_cod_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.detail-penerimaan-cods.edit', $detailPenerimaanCod->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('detail_penerimaan_cod_delete')
                                    <form action="{{ route('admin.detail-penerimaan-cods.destroy', $detailPenerimaanCod->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('detail_penerimaan_cod_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.detail-penerimaan-cods.massDestroy') }}",
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
  let table = $('.datatable-DetailPenerimaanCod:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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