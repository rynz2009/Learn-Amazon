@can('detail_transaksi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.detail-transaksis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.detailTransaksi.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.detailTransaksi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-kodeHppDetailTransaksis">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_transaksi') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_produk') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.desain') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.keterangan_desain') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.size') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.warna') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.harga') }}
                        </th>
                        <th>
                            {{ trans('cruds.detailTransaksi.fields.kode_hpp') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailTransaksis as $key => $detailTransaksi)
                        <tr data-entry-id="{{ $detailTransaksi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $detailTransaksi->id ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksi->kode_transaksi->kode_transaksi ?? '' }}
                            </td>
                            <td>
                                @foreach($detailTransaksi->kode_produks as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_produk }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($detailTransaksi->desain)
                                    <a href="{{ $detailTransaksi->desain->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $detailTransaksi->desain->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $detailTransaksi->keterangan_desain ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksi->size ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksi->warna ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksi->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ $detailTransaksi->harga ?? '' }}
                            </td>
                            <td>
                                @foreach($detailTransaksi->kode_hpps as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_hpp }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('detail_transaksi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.detail-transaksis.show', $detailTransaksi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('detail_transaksi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.detail-transaksis.edit', $detailTransaksi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('detail_transaksi_delete')
                                    <form action="{{ route('admin.detail-transaksis.destroy', $detailTransaksi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('detail_transaksi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.detail-transaksis.massDestroy') }}",
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
  let table = $('.datatable-kodeHppDetailTransaksis:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection