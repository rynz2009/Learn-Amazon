@extends('layouts.admin')
@section('content')
@can('customer_service_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customer-services.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customerService.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerService.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CustomerService">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customerService.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerService.fields.kode_cs') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerService.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerService.fields.no_wa') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerService.fields.alamat') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerServices as $key => $customerService)
                        <tr data-entry-id="{{ $customerService->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $customerService->id ?? '' }}
                            </td>
                            <td>
                                {{ $customerService->kode_cs ?? '' }}
                            </td>
                            <td>
                                {{ $customerService->nama ?? '' }}
                            </td>
                            <td>
                                {{ $customerService->no_wa ?? '' }}
                            </td>
                            <td>
                                {{ $customerService->alamat ?? '' }}
                            </td>
                            <td>
                                @can('customer_service_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.customer-services.show', $customerService->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('customer_service_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.customer-services.edit', $customerService->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('customer_service_delete')
                                    <form action="{{ route('admin.customer-services.destroy', $customerService->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('customer_service_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customer-services.massDestroy') }}",
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
  let table = $('.datatable-CustomerService:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection