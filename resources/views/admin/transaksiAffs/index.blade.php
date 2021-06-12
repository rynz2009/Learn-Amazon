@extends('layouts.admin')
@section('content')
@can('transaksi_aff_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transaksi-affs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transaksiAff.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TransaksiAff', 'route' => 'admin.transaksi-affs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaksiAff.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TransaksiAff">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kode_transaksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kode_produk') }}
                        </th>
                        <th>
                            {{ trans('cruds.listProduct.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.kota') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.propinsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.no_wa') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.total_harga') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.ongkir') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.grand_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.no_awb') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaksiAff.fields.pembayaran') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksiAffs as $key => $transaksiAff)
                        <tr data-entry-id="{{ $transaksiAff->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transaksiAff->id ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->kode_transaksi ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->kode_produk->kode_produk ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->kode_produk->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->nama ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->kota ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->propinsi ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->no_wa ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->total_harga ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->ongkir ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->grand_total ?? '' }}
                            </td>
                            <td>
                                {{ $transaksiAff->no_awb ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TransaksiAff::STATUS_RADIO[$transaksiAff->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TransaksiAff::PEMBAYARAN_RADIO[$transaksiAff->pembayaran] ?? '' }}
                            </td>
                            <td>
                                @can('transaksi_aff_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transaksi-affs.show', $transaksiAff->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transaksi_aff_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transaksi-affs.edit', $transaksiAff->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transaksi_aff_delete')
                                    <form action="{{ route('admin.transaksi-affs.destroy', $transaksiAff->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transaksi_aff_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaksi-affs.massDestroy') }}",
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
  let table = $('.datatable-TransaksiAff:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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