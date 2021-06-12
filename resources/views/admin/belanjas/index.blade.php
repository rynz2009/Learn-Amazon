@extends('layouts.admin')
@section('content')
@can('belanja_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.belanjas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.belanja.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.belanja.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Belanja">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.kode_hpp') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.nama_barang') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.jumlah_barang') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.harga') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.keterangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.sumber_bayar') }}
                        </th>
                        <th>
                            {{ trans('cruds.belanja.fields.type_belanja') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($belanjas as $key => $belanja)
                        <tr data-entry-id="{{ $belanja->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $belanja->id ?? '' }}
                            </td>
                            <td>
                                {{ $belanja->tanggal ?? '' }}
                            </td>
                            <td>
                                @foreach($belanja->kode_hpps as $key => $item)
                                    <span class="badge badge-info">{{ $item->kode_hpp }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $belanja->nama_barang ?? '' }}
                            </td>
                            <td>
                                {{ $belanja->jumlah_barang ?? '' }}
                            </td>
                            <td>
                                {{ $belanja->harga ?? '' }}
                            </td>
                            <td>
                                {{ $belanja->keterangan ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Belanja::SUMBER_BAYAR_RADIO[$belanja->sumber_bayar] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Belanja::TYPE_BELANJA_RADIO[$belanja->type_belanja] ?? '' }}
                            </td>
                            <td>
                                @can('belanja_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.belanjas.show', $belanja->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('belanja_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.belanjas.edit', $belanja->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('belanja_delete')
                                    <form action="{{ route('admin.belanjas.destroy', $belanja->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('belanja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.belanjas.massDestroy') }}",
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
  let table = $('.datatable-Belanja:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection