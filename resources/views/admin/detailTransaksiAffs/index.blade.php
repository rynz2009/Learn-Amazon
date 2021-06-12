@extends('layouts.admin')
@section('content')
@can('detail_transaksi_aff_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.detail-transaksi-affs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.detailTransaksiAff.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'DetailTransaksiAff', 'route' => 'admin.detail-transaksi-affs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.detailTransaksiAff.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DetailTransaksiAff">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.kode_transaksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksiAff.fields.ukuran') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailTransaksiAffs as $key => $detailTransaksiAff)
                        <tr data-entry-id="{{ $detailTransaksiAff->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $detailTransaksiAff->id ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksiAff->kode_transaksi->kode_transaksi ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksiAff->kode_transaksi->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksiAff->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksiAff->ukuran ?? '' }}
                            </td>
                            <td>
                                @can('detail_transaksi_aff_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.detail-transaksi-affs.show', $detailTransaksiAff->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('detail_transaksi_aff_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.detail-transaksi-affs.edit', $detailTransaksiAff->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('detail_transaksi_aff_delete')
                                    <form action="{{ route('admin.detail-transaksi-affs.destroy', $detailTransaksiAff->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('detail_transaksi_aff_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.detail-transaksi-affs.massDestroy') }}",
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
  let table = $('.datatable-DetailTransaksiAff:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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