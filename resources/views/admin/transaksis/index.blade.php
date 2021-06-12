@extends('layouts.admin')
@section('content')
@can('transaksi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transaksis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transaksi.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Transaksi', 'route' => 'admin.transaksis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaksi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transaksi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.kode_transaksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.kode_cs') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.no_wa') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.propinsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.kota') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.kecamatan') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.ongkir') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.no_awb') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.keterangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksi.fields.pembayaran') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $key => $transaksi)
                        <tr data-entry-id="{{ $transaksi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transaksi->id ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->kode_transaksi ?? '' }}
                            </td>
                            <td>
                                @foreach($transaksi->kode_cs as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_cs }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $transaksi->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->nama ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->no_wa ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->propinsi ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->kota ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->kecamatan ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->ongkir ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->no_awb ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Transaksi::STATUS_RADIO[$transaksi->status] ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->keterangan ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Transaksi::PEMBAYARAN_RADIO[$transaksi->pembayaran] ?? '' }}
                            </td>
                            <td>
                                @can('transaksi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transaksis.show', $transaksi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transaksi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transaksis.edit', $transaksi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transaksi_delete')
                                    <form action="{{ route('admin.transaksis.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transaksi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaksis.massDestroy') }}",
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
  let table = $('.datatable-Transaksi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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